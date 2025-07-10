<?php
session_start();
if (!isset($_SESSION['trainer_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "trainer");
$trainer_details = $conn->query("SELECT * FROM member WHERE role = 'trainer'");
$trainer_list = $conn->query("SELECT id, full_name FROM member");

$total_trainers = $conn->query("SELECT COUNT(*) as count FROM member WHERE role = 'trainer'")->fetch_assoc()['count'];
$total_sessions = $conn->query("SELECT COUNT(*) as count FROM trainer_utilization")->fetch_assoc()['count'];
$today = date('Y-m-d');
$active_today = $conn->query("SELECT COUNT(DISTINCT trainer_id) as count FROM trainer_utilization WHERE date = '$today'")->fetch_assoc()['count'];
$inactive_trainers = $conn->query("SELECT COUNT(*) as count FROM member WHERE role = 'trainer' AND id NOT IN (SELECT DISTINCT trainer_id FROM trainer_utilization WHERE date = '$today')")->fetch_assoc()['count'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .tab-content { display: none; }
    .tab-content.active { display: block; }
    .tab-button.active { background-color: #3b82f6; color: white; }
  </style>
</head>
<body class="bg-gray-100">
<div class="flex min-h-screen">
  <!-- Sidebar -->
  <div class="w-64 bg-white shadow-md p-4">
    <h2 class="text-2xl font-bold text-blue-600 mb-6">Admin Dashboard</h2>
    <nav class="space-y-2">
      <button class="tab-button w-full text-left p-3 rounded-lg flex items-center active" data-tab="trainers">
        <i class="fas fa-users mr-3"></i>
        <span>Trainer Details</span>
      </button>
      <button class="tab-button w-full text-left p-3 rounded-lg flex items-center" data-tab="addsession">
        <i class="fas fa-calendar-plus mr-3"></i>
        <span>Add Session</span>
      </button>
      <button class="tab-button w-full text-left p-3 rounded-lg flex items-center" data-tab="addtrainer">
  <i class="fas fa-user-plus mr-3"></i>
  <span>Add Trainer</span>
</button>
<button class="tab-button w-full text-left p-3 rounded-lg flex items-center" data-tab="stats">
  <i class="fas fa-chart-bar mr-3"></i>
  <span>Statistics</span>
</button>

    </nav>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-8 space-y-12">
   <!-- Trainer Details -->
<div id="trainers" class="tab-content active">
  <div class="bg-white rounded-xl shadow-md p-6">

    <div class="flex justify-between items-center mb-4">
  <h2 class="text-2xl font-bold text-blue-700">Trainer Details</h2>
  <div class="flex gap-4">
    <a href="export_excel.php" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">
      📊 Export to Excel
    </a>
    <a href="export_pdf.php" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded">
      🧾 Export to PDF
    </a>
    <form action="logout.php" method="post">
    <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-4 py-2 rounded flex items-center">
      <i class="fas fa-sign-out-alt mr-2"></i>Logout
    </button>
  </form>
  </div>
</div>

        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search trainer by name..." class="mb-4 w-full px-4 py-2 border rounded-lg" />
        
        

        <div class="overflow-x-auto">
          <table id="trainerTable" class="min-w-full bg-white border rounded-xl shadow">
            <thead class="bg-blue-100 text-blue-800">
              <tr>
                <th class="px-4 py-2 text-left">Full Name</th>
                <th class="px-4 py-2 text-left">Phone</th>
                <th class="px-4 py-2 text-left">Language</th>
                <th class="px-4 py-2 text-left">Certifications</th>
                <th class="px-4 py-2 text-left">Availability</th>
                <th class="px-4 py-2 text-left">Actions</th>
              </tr>
            </thead>
            <tbody>
  <?php while ($row = $trainer_details->fetch_assoc()) : 
    if (trim($row['full_name']) == '') continue; // Skip empty rows
  ?>
  <tr class="border-t hover:bg-gray-50" data-id="<?= $row['id'] ?>">
    <td class="px-4 py-2 name"><?= htmlspecialchars($row['full_name']) ?></td>
    <td class="px-4 py-2 phone"><?= htmlspecialchars($row['phone_number']) ?></td>
    <td class="px-4 py-2 Language"><?= htmlspecialchars($row['Language']) ?></td>
    <td class="px-4 py-2 certs"><?= htmlspecialchars($row['certifications']) ?></td>
    <td class="px-4 py-2 avail"><?= htmlspecialchars($row['availability']) ?></td>
    <td class="px-4 py-2 space-x-2">
      <button class="text-blue-600 hover:underline editBtn">Edit</button>
      <button class="text-red-600 hover:underline deleteBtn">Delete</button>
    </td>
  </tr>
  <?php endwhile; ?>
</tbody>

          </table>
        </div>
      </div>
    </div>

    <!-- Add Session -->
    <div id="addsession" class="tab-content">
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">🗓️ Add a New Session</h2>
        <form action="add_session.php" method="POST" class="space-y-6 max-w-3xl">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-semibold mb-1">Trainer Name</label>
              <select name="trainer_id" class="w-full px-4 py-3 border rounded-xl" required>
                <option value="">Select Trainer</option>
                <?php while ($row = $trainer_list->fetch_assoc()) : ?>
                  <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['full_name']) ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div>
              <label class="block text-sm font-semibold mb-1">Course Name</label>
              <input type="text" name="course" class="w-full px-4 py-3 border rounded-xl" required>
            </div>
            <div>
              <label class="block text-sm font-semibold mb-1">Date</label>
              <input type="date" name="session_date" class="w-full px-4 py-3 border rounded-xl" required>
            </div>
            <div>
              <label class="block text-sm font-semibold mb-1">Time</label>
              <input type="time" name="session_time" class="w-full px-4 py-3 border rounded-xl" required>
            </div>
            <div>
              <label class="block text-sm font-semibold mb-1">Location</label>
              <input type="text" name="location" class="w-full px-4 py-3 border rounded-xl" required>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold rounded-full shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
              ➕ Add Session
            </button>
          </div>
        </form>
      </div>
    </div>
<!-- Add Trainer -->
<div id="addtrainer" class="tab-content">
  <div class="bg-white rounded-3xl shadow-xl overflow-hidden p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">👨‍🏫 Add a New Trainer</h2>
    <div id="trainerMessage" class="mb-4 text-green-600 font-semibold"></div>
    <form id="addTrainerForm" method="POST" class="space-y-6 max-w-3xl">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-semibold mb-1">Email</label>
          <input type="email" name="email" class="w-full px-4 py-3 border rounded-xl" required>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Password</label>
          <input type="text" name="password" class="w-full px-4 py-3 border rounded-xl" required>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Full Name</label>
          <input type="text" name="full_name" class="w-full px-4 py-3 border rounded-xl" required>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Phone Number</label>
          <input type="text" name="phone_number" class="w-full px-4 py-3 border rounded-xl" required>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Language</label>
          <input type="text" name="language" class="w-full px-4 py-3 border rounded-xl" required>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Certifications</label>
          <input type="text" name="certifications" class="w-full px-4 py-3 border rounded-xl" required>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Availability</label>
          <select name="availability" class="w-full px-4 py-3 border rounded-xl" required>
            <option value="Monday - Friday">Monday - Friday</option>
            <option value="Weekend Only">Weekend Only</option>
            <option value="Flexible">Flexible</option>
          </select>
        </div>
      </div>
      <input type="hidden" name="role" value="trainer">
      <div class="text-right">
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-500 to-blue-500 text-white font-semibold rounded-full shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
          ➕ Add Trainer
        </button>
      </div>
    </form>
  </div>
</div>    
<!-- Statistics Tab -->
<div id="stats" class="tab-content">
  <div class="bg-white rounded-3xl shadow-xl p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">📊 Dashboard Statistics</h2>
    <div class="bg-blue-100 p-6 rounded-xl shadow text-center cursor-pointer hover:bg-blue-200 transition" onclick="toggleTrainerList()">
  <h3 class="text-xl font-semibold text-blue-800">👨‍🏫 Total Trainers</h3>
  <p class="text-4xl font-bold text-blue-900 mt-2"><?= $total_trainers ?></p>
</div>

<!-- Hidden Trainer List -->
<div id="trainerNameList" class="mt-4 hidden bg-white border border-blue-200 rounded-xl p-4 text-left shadow">
  <h4 class="text-lg font-semibold text-blue-700 mb-3">Trainer Names:</h4>
  <ul class="list-disc list-inside space-y-1 text-gray-800">
    <?php
  $all_trainers = $conn->query("SELECT full_name FROM member WHERE role = 'trainer'");
  while ($trainer = $all_trainers->fetch_assoc()) {
    $name = trim($trainer['full_name']);
    if (!empty($name)) {
      echo "<li>" . htmlspecialchars($name) . "</li>";
    }
  }
?>

  </ul>
</div>
<!-- Total Sessions Card -->
<div class="bg-green-100 p-6 rounded-xl shadow text-center cursor-pointer hover:bg-green-200 transition" onclick="toggleSessionList()">
  <h3 class="text-xl font-semibold text-green-800">📚 Total Sessions</h3>
  <p class="text-4xl font-bold text-green-900 mt-2"><?= $total_sessions ?></p>
</div>

<!-- Hidden Session List -->
<div id="sessionList" class="mt-4 hidden bg-white border border-green-200 rounded-xl p-4 text-left shadow">
  <h4 class="text-lg font-semibold text-green-700 mb-3">Session Details:</h4>
  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg text-sm text-left">
      <thead class="bg-green-100 text-green-800">
        <tr>
          <th class="px-4 py-2">Trainer Name</th>
          <th class="px-4 py-2">Course</th>
          <th class="px-4 py-2">Date</th>
          <th class="px-4 py-2">Time</th>
          <th class="px-4 py-2">Location</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sessionDetails = $conn->query("SELECT t.full_name, u.course, u.date, u.time, u.location 
                                          FROM trainer_utilization u 
                                          JOIN member t ON u.trainer_id = t.id 
                                          ORDER BY u.date DESC");
          while ($row = $sessionDetails->fetch_assoc()) {
            echo "<tr class='border-t hover:bg-gray-50'>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['full_name']) . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['course']) . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['date']) . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['time']) . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['location']) . "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

      <!-- Active Today Card -->
<div class="bg-yellow-100 p-6 rounded-xl shadow text-center cursor-pointer hover:bg-yellow-200 transition" onclick="toggleActiveList()">
  <h3 class="text-xl font-semibold text-yellow-800">⏳ Active Today</h3>
  <p class="text-4xl font-bold text-yellow-900 mt-2"><?= $active_today ?></p>
</div>

<!-- Hidden Active Trainer List -->
<div id="activeList" class="mt-4 hidden bg-white border border-yellow-200 rounded-xl p-4 text-left shadow">
  <h4 class="text-lg font-semibold text-yellow-700 mb-3">Active Trainers Today:</h4>
  <ul class="list-disc pl-6 text-gray-700">
    <?php
      $activeList = $conn->query("SELECT m.full_name, tu.course, tu.time, tu.location 
                            FROM member m 
                            JOIN trainer_utilization tu ON m.id = tu.trainer_id 
                            WHERE tu.date = CURDATE()
                            ORDER BY m.full_name ASC, tu.time ASC");
if ($activeList->num_rows > 0) {
  while ($row = $activeList->fetch_assoc()) {
    $name = htmlspecialchars($row['full_name']);
    $course = htmlspecialchars($row['course']);
    $time = htmlspecialchars($row['time']);
    $location = htmlspecialchars($row['location']);
    
    echo "<li class='mb-2'>
      <span class='font-semibold text-blue-800'>$name</span><br>
      <span class='ml-4 text-gray-700'>📚 $course at 🕒 $time, 🏫 $location</span>
    </li>";
  }
} else {
  echo "<li class='text-red-500'>No trainers are active today.</li>";
}

    ?>
  </ul>
</div>

      <!-- Inactive Trainers Card -->
<div class="bg-red-100 p-6 rounded-xl shadow text-center cursor-pointer hover:bg-red-200 transition" onclick="toggleInactiveList()">
  <h3 class="text-xl font-semibold text-red-800">🔴 Inactive Trainers</h3>
  <p class="text-4xl font-bold text-red-900 mt-2"><?= $inactive_trainers ?></p>
</div>

<!-- Hidden Inactive Trainer List -->
<div id="inactiveList" class="mt-4 hidden bg-white border border-red-200 rounded-xl p-4 text-left shadow">
  <h4 class="text-lg font-semibold text-red-700 mb-3">Inactive Trainers (No sessions today):</h4>
  <ul class="list-disc pl-6 text-gray-700">
   <?php
$inactiveList = $conn->query("SELECT full_name FROM member 
  WHERE role = 'trainer' AND id NOT IN (
    SELECT DISTINCT trainer_id FROM trainer_utilization WHERE date = CURDATE()
  )");
while ($row = $inactiveList->fetch_assoc()) {
  $name = trim($row['full_name']);
  if (!empty($name)) {
    echo "<li>" . htmlspecialchars($name) . "</li>";
  }
}
?>

  </ul>
</div>

    </div>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
  <div class="bg-white p-6 rounded-lg max-w-md w-full">
    <h2 class="text-xl font-bold mb-4">Edit Trainer</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="edit_id">
      <div class="mb-2">
        <label class="block text-sm">Full Name</label>
        <input type="text" name="full_name" id="edit_name" class="w-full border px-3 py-2 rounded">
      </div>
      <div class="mb-2">
        <label class="block text-sm">Phone</label>
        <input type="text" name="phone_number" id="edit_phone" class="w-full border px-3 py-2 rounded">
      </div>
      <div class="mb-2">
        <label class="block text-sm">Language</label>
        <input type="text" name="Language" id="edit_Language" class="w-full border px-3 py-2 rounded">
      </div>
      <div class="mb-2">
        <label class="block text-sm">Certifications</label>
        <input type="text" name="certifications" id="edit_certs" class="w-full border px-3 py-2 rounded">
      </div>
      <div class="mb-4">
        <label class="block text-sm">Availability</label>
        <input type="text" name="availability" id="edit_avail" class="w-full border px-3 py-2 rounded">
      </div>
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="$('#editModal').hide()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Tab switch
  document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabContents.forEach(tab => tab.classList.remove('active'));
        button.classList.add('active');
        document.getElementById(button.dataset.tab).classList.add('active');
      });
    });
  });

  // Handle Add Trainer via AJAX
$(document).ready(function () {
  $("#addTrainerForm").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "add_trainer.php",
      data: $(this).serialize(),
      success: function (response) {
        $("#trainerMessage").text("✅ Trainer added successfully!");
        $("#addTrainerForm")[0].reset(); // Clear form
      },
      error: function () {
        $("#trainerMessage").text("❌ Failed to add trainer.").removeClass("text-green-600").addClass("text-red-600");
      }
    });
  });
});


  // Search filter
  function filterTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const rows = document.querySelectorAll("#trainerTable tbody tr");
    rows.forEach(row => {
      const name = row.querySelector(".name").innerText.toLowerCase();
      row.style.display = name.includes(input) ? "" : "none";
    });
  }

  // Edit Button
  $(document).on("click", ".editBtn", function () {
    const row = $(this).closest("tr");
    $("#edit_id").val(row.data("id"));
    $("#edit_name").val(row.find(".name").text());
    $("#edit_phone").val(row.find(".phone").text());
    $("#edit_Language").val(row.find(".Language").text());
    $("#edit_certs").val(row.find(".certs").text());
    $("#edit_avail").val(row.find(".avail").text());
    $("#editModal").show();
  });

  // Submit Edit
  $("#editForm").submit(function (e) {
    e.preventDefault();
    $.post("edit_trainer.php", $(this).serialize(), function () {
      location.reload();
    });
  });

  // Delete Trainer
  $(document).on("click", ".deleteBtn", function () {
    const id = $(this).closest("tr").data("id");
    if (confirm("Are you sure you want to delete this trainer?")) {
      $.post("delete_trainer.php", { id }, function () {
        location.reload();
      });
    }
  });
  function openTab(tabId) {
  document.querySelectorAll('.tab-button').forEach(btn => {
    btn.classList.remove('active');
    if (btn.dataset.tab === tabId) {
      btn.classList.add('active');
    }
  });
  document.querySelectorAll('.tab-content').forEach(tab => {
    tab.classList.remove('active');
  });
  document.getElementById(tabId).classList.add('active');
}
function toggleTrainerList() {
  const list = document.getElementById('trainerNameList');
  list.classList.toggle('hidden');
}
function toggleSessionList() {
  const list = document.getElementById('sessionList');
  list.classList.toggle('hidden');
}
function toggleActiveList() {
  const list = document.getElementById('activeList');
  list.classList.toggle('hidden');
}

function toggleInactiveList() {
  const list = document.getElementById('inactiveList');
  list.classList.toggle('hidden');
}

</script>
</body>
</html>

