<!DOCTYPE html>
<html>
<head>
    <title>Auto Complete Example</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <h1>Auto Complete Example</h1>
    
    <label for="fruit">Fruit:</label>
    <input type="text" name="fruit" id="fruit" autocomplete="off">
    
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            var fruits = ["Apple", "Banana", "Cherry", "Durian", "Elderberry", "Fig", "Grapes", "Honeydew"];
            
            $("#fruit").autocomplete({
                source: fruits
            });
        });
    </script>
</body>
</html>
