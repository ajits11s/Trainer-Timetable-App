<?php
session_start(); 
if (!isset($_SESSION['trainer_id'])) {
    header("Location: login.html");
    exit();
}
// Get the trainer ID from the session
$trainer_id = $_SESSION['trainer_id'];
$role = $_SESSION['role'];
// Database connection parameters
$host = "localhost";
$user = "root";
$pass = "";
$db = "trainer";  
// Create a new database connection
$conn = new mysqli($host, $user, $pass, $db);
// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch ONLY trainer profile info (for profile section)
$trainer_info = [];
$sql_trainer = "SELECT email, full_name, phone_number,Language,certifications,availability FROM member WHERE id = $trainer_id";
$result_trainer = $conn->query($sql_trainer);
if ($result_trainer->num_rows > 0) {
    $trainer_info = $result_trainer->fetch_assoc();
}
// Fetch ONLY upcoming sessions (for sessions section)
$upcoming_sessions = [];
$sql_sessions = "SELECT * FROM trainer_utilization 
                WHERE trainer_id = $trainer_id 
                ORDER BY date ASC, time ASC";

$result_sessions = $conn->query($sql_sessions);


// Prepare events for the calendar

$upcoming_sessions = [];
$events = [];
$now = time();

while ($row = $result_sessions->fetch_assoc()) {
    $upcoming_sessions[] = $row;

    $start_datetime = strtotime($row['date'] . ' ' . $row['time']);
    $isUpcoming = $start_datetime >= $now;

    $events[] = [
        'title' => $row['course'],
        'start' => $row['date'] . 'T' . $row['time'],
        'description' => $row['location'],
        'color' => $isUpcoming ? '#3b82f6' : null,       // Blue highlight for upcoming
        'textColor' => $isUpcoming ? 'white' : null      // White text for blue background
    ];
}



// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Calendar Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .tab-button.active {
            background-color: #3b82f6;
            color: white;
        }
        #calendar {
            height: 600px;
        }
        .session-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .fc-event {
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4 border-b">
                <h1 class="text-xl font-bold text-blue-600">Trainer Dashboard</h1>
            </div>
            <nav class="space-y-1 p-2">
                <button class="tab-button w-full text-left p-3 rounded-lg flex items-center active" data-tab="profile">
                    <i class="fas fa-user mr-3"></i>
                    <span>Trainer Profile</span>
                </button>
                <button class="tab-button w-full text-left p-3 rounded-lg flex items-center" data-tab="calendar-tab">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    <span>Session Calendar</span>
                </button>
                <button class="tab-button w-full text-left p-3 rounded-lg flex items-center" data-tab="upcoming">
                    <i class="fas fa-list mr-3"></i>
                    <span>Upcoming Sessions</span>
                </button>
                <button class="tab-button w-full text-left p-3 rounded-lg flex items-center" data-tab="status">
                   <i class="fas fa-clipboard-list mr-3"></i>
                   <span>Session Status</span>
                 </button>

            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-8">
<!-- Trainer Profile Tab -->
<div id="profile" class="tab-content active">
  <div class="flex justify-end mb-4">
    <form action="logout.php" method="post">
        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
            <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </button>
    </form>
</div>
    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
        <div class="flex items-center mb-6">
            <div class="mr-4">
                <img src="https://cdn-icons-png.freepik.com/512/7718/7718888.png"
                     alt="Trainer Profile Logo"
                     class="rounded-full h-24 w-24 object-cover border-4 border-blue-200 shadow-lg">
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
    <?php echo htmlspecialchars($trainer_info['full_name'] ?? '--'); ?>
</h2>

                <p class="text-gray-600">Certified Trainer</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="font-semibold text-blue-800 mb-2">Contact Information</h3>
                <p class="text-gray-700"><i class="fas fa-envelope mr-2 text-blue-600"></i> 
    <?php echo htmlspecialchars($trainer_info['email'] ?? '--'); ?>
</p>

                <p class="text-gray-700 mt-2"><i class="fas fa-phone mr-2 text-blue-600"></i> 
    <?php echo htmlspecialchars($trainer_info['phone_number'] ?? '--'); ?>
</p>

            </div>
            
            <div class="bg-blue-50 p-4 rounded-lg">
    <h3 class="font-semibold text-blue-800 mb-2">Language</h3>
    <div class="flex flex-wrap gap-2">
        <?php 
            $Language_items = explode(', ', $trainer_info['Language'] ?? '--');
            if ($Language_items[0] === '--') {
                echo '<span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">--</span>';
            } else {
                foreach ($Language_items as $item) {
                    if (!empty($item)) {
                        echo '<span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">' . htmlspecialchars($item) . '</span>';
                    }
                }
            }
        ?>
    </div>
</div>

            
            <div class="bg-blue-50 p-4 rounded-lg">
    <h3 class="font-semibold text-blue-800 mb-2">Certifications</h3>
    <ul class="list-disc list-inside text-gray-700">
        <?php 
            $cert_items = explode(', ', $trainer_info['certifications'] ?? '--');
            foreach ($cert_items as $item) {
                if (!empty($item)) {
                    echo '<li>' . htmlspecialchars($item) . '</li>';
                } else {
                    echo '<li>--</li>'; // Display -- if no certifications
                }
            }
        ?>
    </ul>
</div>

            
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="font-semibold text-blue-800 mb-2">Availability</h3>
                <p class="text-gray-700">
    <?php echo nl2br(htmlspecialchars($trainer_info['availability'] ?? '--')); ?>
</p>
               
            </div>
        </div>
    </div>
</div>

            <!-- Calendar Tab -->
<div id="calendar-tab" class="tab-content transition-all duration-300">
    <div class="rounded-xl overflow-hidden shadow-2xl bg-white">
        <div class="p-6 border-b bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-white">
            <h2 class="text-xl font-bold">📅 Your Session Calendar</h2>
            <p class="text-sm opacity-90">Track your upcoming sessions</p>
        </div>
        <div class="p-6">
            <div id="calendar" class="rounded-lg overflow-hidden shadow-inner bg-gray-50 p-4"></div>
        </div>
    </div>
</div>


            <!-- Upcoming Sessions Tab -->
<div id="upcoming" class="tab-content">
  <div class="bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-blue-700 mb-8 flex items-center">
      <i class="fas fa-calendar-alt mr-3 text-blue-500"></i> Upcoming Sessions
    </h2>

    <?php if (empty($upcoming_sessions)): ?>
      <div class="text-center py-10">
        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <h3 class="mt-4 text-xl font-semibold text-gray-700">No upcoming sessions</h3>
        <p class="text-gray-500">Your session list is empty for now.</p>
      </div>
    <?php else: ?>
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($upcoming_sessions as $session): ?>
          <div class="bg-blue-50 hover:bg-blue-100 transition rounded-xl shadow-md p-5 border border-blue-100">
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-lg font-semibold text-blue-800"><?= htmlspecialchars($session['course']) ?></h3>
              <span class="bg-white text-blue-600 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                <?= htmlspecialchars($session['location']) ?>
              </span>
            </div>
            <div class="text-sm text-gray-600 mt-2 space-y-1">
              <div class="flex items-center">
                <i class="far fa-calendar-alt mr-2 text-blue-500"></i>
                <?= date('D, M j, Y', strtotime($session['date'])) ?>
              </div>
              <div class="flex items-center">
                <i class="far fa-clock mr-2 text-blue-500"></i>
                <?= date('g:i A', strtotime($session['time'])) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Session Status Tab -->
<!-- Session Status Tab -->
<div id="status" class="tab-content">
  <div class="bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-green-600 mb-6 flex items-center">
      <i class="fas fa-check-circle mr-3 text-green-500"></i> Course Session Status
    </h2>

    <?php
    // Step 1: Combine all sessions (upcoming + past)
    $all_sessions = [];

    // Fetch all sessions from DB for this trainer
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_all = "SELECT * FROM trainer_utilization WHERE trainer_id = $trainer_id ORDER BY date ASC, time ASC";
    $result_all = $conn->query($sql_all);

    while ($row = $result_all->fetch_assoc()) {
        $all_sessions[] = $row;
    }

    $conn->close();

    // Step 2: Group sessions by course and count status
    $course_sessions = [];

    foreach ($all_sessions as $session) {
        $course = $session['course'];
        $datetime = strtotime($session['date'] . ' ' . $session['time']);
        $now = time();

        if (!isset($course_sessions[$course])) {
            $course_sessions[$course] = [
                'total' => 0,
                'completed' => 0,
                'remaining' => 0
            ];
        }

        $course_sessions[$course]['total']++;

        if ($datetime < $now) {
            $course_sessions[$course]['completed']++;
        } else {
            $course_sessions[$course]['remaining']++;
        }
    }
    ?>

    <?php if (empty($course_sessions)): ?>
      <p class="text-gray-600">No session data available.</p>
    <?php else: ?>
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-green-100 text-green-800">
            <th class="py-2 px-4">Course</th>
            <th class="py-2 px-4">Total Sessions</th>
            <th class="py-2 px-4">Completed</th>
            <th class="py-2 px-4">Remaining</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($course_sessions as $course => $data): ?>
            <tr class="border-b hover:bg-gray-50">
              <td class="py-2 px-4 font-semibold text-gray-700"><?= htmlspecialchars($course) ?></td>
              <td class="py-2 px-4"><?= $data['total'] ?></td>
              <td class="py-2 px-4 text-gray-500"><?= $data['completed'] ?></td>
              <td class="py-2 px-4 text-blue-600"><?= $data['remaining'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</div>



    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize calendar and tab switching
            initCalendar();
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding content
                    button.classList.add('active');
                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                    
                    // Initialize calendar if we're switching to that tab
                    if (tabId === 'calendar-tab') {
                        initCalendar();
                    }
                });
            });
            

            // Initialize calendar
            function initCalendar() {
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    aspectRatio: 1.5,
    nowIndicator: true,
    navLinks: true,
    events: <?php echo json_encode($events); ?>,

  eventContent: function(arg) {
    const container = document.createElement('div');
  container.style.display = 'flex';
  container.style.flexDirection = 'column';
  container.style.alignItems = 'center';
  container.style.justifyContent = 'center';
  container.style.height = '100%'; 
  container.style.width = '100%';   
  container.style.textAlign = 'center';
  container.style.whiteSpace = 'normal'; 
     container.style.marginTop = '-8px'; 
    container.style.boxSizing = 'border-box';
    container.style.padding = '2px 4px';


    const title = document.createElement('div');
    title.innerHTML = '🏫 ' + arg.event.title;
    title.style.fontWeight = 'bold';
    title.style.fontSize = '15px';
    title.style.color = '#1d4ed8'; 
  title.style.marginBottom = '2px';

    const time = document.createElement('div');
    const date = new Date(arg.event.start);
    const timeString = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    time.innerHTML = '🕒 ' + timeString;
    time.style.fontSize = '12px';
    time.style.color = '#374151'; 

    container.appendChild(title);
    container.appendChild(time);

    return { domNodes: [container] };
},


    eventClick: function(info) {
        const start = new Date(info.event.start);
        const timeString = start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const dateString = start.toLocaleDateString();

        document.getElementById('modalTitle').innerText = info.event.title;
        document.getElementById('modalDate').innerText = dateString;
        document.getElementById('modalTime').innerText = timeString;
        document.getElementById('modalLocation').innerText = info.event.extendedProps.description || 'N/A';

        const sessionModal = new bootstrap.Modal(document.getElementById('sessionModal'));
        sessionModal.show();
    }
});

                calendar.render();
            }          
        });
    
    </script>

<!-- Modal for Session Details -->
<div class="modal fade" id="sessionModal" tabindex="-1" aria-labelledby="sessionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="sessionModalLabel">Session Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Session:</strong> <span id="modalTitle"></span></p>
        <p><strong>Date:</strong> <span id="modalDate"></span></p>
        <p><strong>Time:</strong> <span id="modalTime"></span></p>
        <p><strong>Location:</strong> <span id="modalLocation"></span></p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
