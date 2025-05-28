<?php
session_start();
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['output' => 'Metodă invalidă de cerere']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$language = $data['language'] ?? '';
$code = $data['code'] ?? '';

$output = '';
$error = '';


if ($language === 'cpp') {
    $filename = uniqid("code_", true) . '.cpp';
    file_put_contents($filename, $code);

    
    $compile = "g++ $filename -o output 2>&1";
    $compile_output = shell_exec($compile);

    if ($compile_output) {
        $output = "Eroare la compilare:\n" . $compile_output;
    } else {
        
        $output_path = getcwd() . '/output';
        
        
        $run_output = shell_exec($output_path);

        if ($run_output) {
            $output = $run_output;
        } else {
            $output = 'Fără rezultat.';
        }
    }

    unlink($filename);
    if (file_exists($output_path)) unlink($output_path);

} elseif ($language === 'python3') {
    $filename = uniqid("code_", true) . '.py';
    file_put_contents($filename, $code);

    
    $run_output = shell_exec("python3 $filename 2>&1");

    if ($run_output) {
        $output = $run_output;
    } else {
        $output = 'Fără rezultat.';
    }

    unlink($filename);
} else {
    $output = 'Limbaj nesuportat.';
}


echo json_encode(['output' => $output]);
?>
