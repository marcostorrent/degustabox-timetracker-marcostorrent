import $ from 'jquery';

$(function () {
    $('#addTask').on('click', function (event) {
        event.preventDefault();
        var taskName = $('#taskName').val();

        $.ajax({
            url: '/api/save-task',
            method: 'POST',
            data: { name: taskName },
            success: function (response) {
                console.log('Task saved successfully');
                console.log('Total tasks: ' + response.total_tasks);
            },
            error: function (xhr, status, error) {
                console.error('Error saving task: ' + error + ', Task Name: ' + taskName);
            }
        });
    });

    $('#stopTask').on('click', function() {
        const taskName = $('#taskName').val().trim();
        $.ajax({
            url: '/api/stop-task',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ name: taskName }),
            success: function(data) {
                if (data.error === false) {
                    console.log('Task stopped successfully');
                    fetchTasksToday();
                } else {
                    console.error('Error stopping task:', data.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error stopping task:', error);
            }
        });
    });

    const workedTimeElement = document.querySelector('.todayTime p');

    function fetchTasksToday() {
        fetch('/api/tasks/today') 
            .then(response => response.json())
            .then(data => {
                if (!data.error) {
                    const totalTimeToday = formatTime(data.total_time_today);
                    workedTimeElement.textContent = totalTimeToday;

                    const tableBody = document.querySelector('.table tbody');
                    tableBody.innerHTML = '';

                    for (const taskKey in data.tasks_today) {
                        if (data.tasks_today.hasOwnProperty(taskKey)) {
                            const task = data.tasks_today[taskKey];
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${task.name}</td>
                                <td>${formatTime(task.total_tracked_time)}</td>
                            `;
                            tableBody.appendChild(row);
                        }
                    }
                } else {
                    console.error('Error fetching tasks for today: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error fetching tasks for today: ' + error);
            });
    }

    fetchTasksToday();
});

function formatTime(minutes) {
    const hours = Math.floor(minutes / 60);
    const remainingMinutes = minutes % 60;
    return `${hours}h ${remainingMinutes}min`;
}
