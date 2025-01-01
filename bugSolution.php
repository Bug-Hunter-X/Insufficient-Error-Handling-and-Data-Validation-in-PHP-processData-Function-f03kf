```php
<?php
function processData(array $data): array {
    $result = [];
    foreach ($data as $item) {
        // Validate keys using assertion
        assert(isset($item['id']) && isset($item['value']), "Missing 'id' or 'value' key in item: " . json_encode($item));

        $result[$item['id']] = $item['value'];
    }
    return $result;
}

$data = [
    ['id' => 1, 'value' => 'a'],
    ['id' => 2, 'value' => 'b'],
    ['id' => 3],
    ['value' => 'd'],
    ['id' => 4, 'value' => 'e']
];

try {
    $processedData = processData($data);
    print_r($processedData);
} catch (AssertionError $e) {
    echo "Error: " . $e->getMessage() . '\n';
}
?>
```