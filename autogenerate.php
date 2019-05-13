<?php

$source = file_get_contents('https://td39.tripolis.com/api2/docs/api');
preg_match_all('/\<a href=\"([^\"]*)"\>\(wsdl\)/', $source, $matches);
$wsdls = $matches[1];


foreach ($wsdls as $wsdl) {
    $classes = [];
    $wsdl = str_replace('..', '/api2', $wsdl);
    preg_match('/\/([A-Za-z]*)Service/', $wsdl, $matches);

    $client = new SoapClient('https://td39.tripolis.com' . $wsdl);
    $className = $matches[1];
    $functions = $client->__getFunctions();
    $types = $client->__getTypes();

    foreach ($functions as $function) {
        preg_match('/^[A-Za-z]* ([A-Za-z]*)\(/', $function, $matches);
        $functionName = $matches[1];
        $classes[$className][$functionName] = [];
        $pattern = '/^struct ' . $functionName . ' {/i';
        $matches = preg_grep($pattern, $types);
        $match = array_pop($matches);
        $pattern = '/([A-Za-z0-9]*) ([A-Za-z0-9]*)\;/im';
        preg_match($pattern, $match, $matches);
        $request = $matches[2];
        $requestObj = $matches[1];
        $pattern = '/^struct ' . $requestObj . ' {/i';
        $matches = preg_grep($pattern, $types);
        $match = array_pop($matches);
        $pattern = '/([A-Za-z0-9]*) ([A-Za-z0-9]*)\;/im';
        preg_match_all($pattern, $match, $matches);
        $classes[$className][$functionName]['request'] = $request;
        $classes[$className][$functionName]['params'] = $matches[2];
        $pattern = '/^struct ' . $functionName . 'Response {/i';
        $matches = preg_grep($pattern, $types);
        $match = array_pop($matches);
        $pattern = '/([A-Za-z0-9]*) ([A-Za-z0-9]*)\;/im';
        preg_match($pattern, $match, $matches);
        $response = $matches[1];
        $responseString = getResponseFields($response, $types);
        //array_shift($responseString);
        if($responseString) {
            $classes[$className][$functionName]['response'] = '->' . implode('->', $responseString);
        }
        if (strpos($response, 'ListResponse') !== false) {
            $classes[$className][$functionName]['paged'] = 1;
        }
    }

    foreach ($classes as $class => $functions) {
        $src = '<?php' . PHP_EOL . PHP_EOL;
        $src .= 'namespace jobcastrop\tripolis;' . PHP_EOL . PHP_EOL;
        $src .= 'class ' . $class . ' extends TripolisService' . PHP_EOL . '{' . PHP_EOL;
        foreach ($functions as $name => $function) {
            $_params = '';
            if ($function['params']) {
                $_params = '$' . implode(', $', $function['params']);
            }
            $request = $function['request'];
            $response = $function['response'];
            $array = '';
            if ($request) {
                $array = "\n\t\t\t'$request' => array(";
                if ($function['params']) {
                    foreach ($function['params'] as $param) {
                        $array .= "\n\t\t\t\t'$param' => \$$param,";
                    }
                }
                if (isset($function['paged'])) {
                    $array .= "\n\t\t\t\t'paging' => array('pageSize' => 100, 'pageNr' => 1)";
                }
                $array .= "\r\t\t\t)\r\t\t";
            }
            $src .= "\tpublic function " . $name . ' (' . $_params . ')' . PHP_EOL . "\t{" . PHP_EOL;
            $src .= "\t\t\$request = array($array);\n\n";
            if (!isset($function['paged'])) {
                $src .= "\t\t\$result = \$this->send(\"$wsdl\", '$name', \$request);";
                $src .= "\n\t\treturn \$result$response;";
            } else {
                $src .= "\t\t\$return = [];\r";
                $src .= "\t\tdo {\n";
                $src .= "\t\t\t\$result = \$this->send(\"$wsdl\", '$name', \$request);\n";
                $src .= "\t\t\t\$request['$request']['paging']['pageNr']++;\n";
                $src .= "\t\t\tforeach(\$result$response as \$row) {\n\t\t\t\t\$return[] = \$row;\r\t\t\t}\n";
                $src .= "\t\t} while(isset(\$result->paging->totalItems) && \$result->paging->totalItems > count(\$return));\n";
                $src .= "\n\t\treturn \$return;";
            }

            $src .= "\n\t}\n\n";
        }
        $src .= '}';

        file_put_contents('src/Tripolis/' . $class . '.php', $src);
    }

}

function getResponseFields($response, $types, $depth = 1, $string = [])
{
    $pattern = '/^struct ' . $response . ' {/i';
    $matches = preg_grep($pattern, $types);
    $match = array_pop($matches);
    if (!$match || $depth > 2) {
        return $string;
    }
    $pattern = '/([A-Za-z0-9]*) ([A-Za-z0-9]*)\;/im';
    preg_match_all($pattern, $match, $matches);
    $fields = $matches[1];
    $names = $matches[2];
    if (!$fields) {
        return $string;
    }
    foreach ($fields as $i => $field) {
        $name = $names[$i];
        if (in_array($field, ['string', 'int', 'boolean', 'dateTime', 'ProcessStatus'])) {
            return $string;
        }
        $string[] = $name;
        return getResponseFields($field, $types, $depth + 1, $string);
    }

    return $string;
}

