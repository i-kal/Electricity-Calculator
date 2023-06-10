<!DOCTYPE html>
<html>
<head>
    <title>Electricity Charge Calculator</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Electricity Charge Calculator</h1>
        <form method="POST" action="process_form.php">
            <div class="form-group">
                <label for="voltage">Voltage (in volts):</label>
                <input type="number" class="form-control" name="voltage" id="voltage" required>
            </div>
            <div class="form-group">
                <label for="current">Current (in amperes):</label>
                <input type="number" class="form-control" name="current" id="current" required>
            </div>
            <div class="form-group">
                <label for="currentRate">Current Rate (in dollars per kilowatt-hour):</label>
                <input type="number" class="form-control" name="currentRate" id="currentRate" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>

    <?php
    function calculateElectricityCharge($voltage, $current, $currentRate) {
        $power = $voltage * $current; // Calculate power in watts
        $energy = $power * 1 * 1000; // Calculate energy in watt-hours (assuming 1 hour)
        $totalCharge = $energy * ($currentRate / 100); // Calculate total charge
        
        return [
            'power' => $power,
            'energy' => $energy,
            'totalCharge' => $totalCharge
        ];
    }
    
    // Example usage:
    $voltage = 220; // User input: voltage in volts
    $current = 5; // User input: current in amperes
    $currentRate = 0.15; // User input: current rate in dollars per kilowatt-hour
    
    $result = calculateElectricityCharge($voltage, $current, $currentRate);
    
    echo "Power: " . $result['power'] . " W<br>";
    echo "Energy: " . $result['energy'] . " Wh<br>";
    echo "Total Charge: $" . $result['totalCharge'] . "<br>";

    ?>

    <!-- Add Bootstrap JS scripts here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>