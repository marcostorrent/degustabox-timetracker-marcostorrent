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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Summary of the Time Tracker -->
    <div class="container mt-4">
        <h2>Summary of the Time Tracker</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Time tracked</th> <!-- Modificado a "Time tracked" -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>2 hours</td> <!-- Ejemplo de tiempo registrado -->
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>3 hours</td> <!-- Ejemplo de tiempo registrado -->
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Text for Worked Time Today -->
    <div class="container mt-4">
        <h2>Worked Time Today</h2>
        <p>Today's worked time along with the date.</p>
    </div>
</body>

</html>
