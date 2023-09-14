<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TimeTracker (Marcos Torrent)</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <!-- Header -->
    <header class="bg-primary text-white text-center py-4">
        <h1>TimeTracker (Marcos Torrent)</h1>
    </header>

    <!-- Task Name Input -->
    <div class="container mt-4">
        <h2>Task Name</h2>
        <form>
            <div class="form-group">
                <label for="taskName">Name:</label>
                <input type="text" class="form-control" id="taskName" placeholder="Enter task name">
            </div>
            <button type="button" class="btn btn-primary" id="addTask">Add</button>
            <button type="button" class="btn btn-danger" id="stopTask">Stop</button>
        </form>
    </div>

    <!-- Summary of the Time Tracker -->
    <div class="container mt-4">
        <h2>Summary of the Time Tracker</h2>
        <table class="table">
            <thead>
                <tr>                    
                    <th>Name</th>
                    <th>Time tracked today</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <!-- Worked Time Today -->
    <div class="container mt-4 todayTime">
        <h2>Worked Time Today</h2>
        <p></p>
    </div>

</body>

</html>
