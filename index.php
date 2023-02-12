<?php
$dataTypes = ["int", "string", "float", "bool", "array"];
$setValues = [25, 8.2, 0];

$classCode = "<?php\nrequire 'Experiment.php';\n\nclass Conversion{\n";

foreach ($dataTypes as $value1) {
    foreach ($dataTypes as $value2) {
        $methodCode = "    public static function ${value1}TO${value2}(\$$value1): $value2 {\n";
        $methodCode .= "        return \$$value1;\n    }\n\n";
        $classCode .= $methodCode;
    }
}

$classCode .= "}";

foreach ($setValues as $val) {
    foreach ($dataTypes as $from) {
        foreach ($dataTypes as $to) {
            $methodName = "${from}TO${to}";
            $code = "\$marsh = Conversion::$methodName($val);\n";
            $code .= "echo '$from TO $to (Value = $val) = ' . var_export(\$marsh, true) . \"\\n\";\n\n";
            echo $code;
        }
    }
}

file_put_contents("vysledek.php", $classCode);
