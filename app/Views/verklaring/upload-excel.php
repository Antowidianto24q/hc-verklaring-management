<?php // File: app/Views/excel_upload.php ?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="p-6">
  <div class="flex justify-between items-center mb-4">
    <div class="flex gap-2">
      <!-- Upload Excel Button -->
      <button onclick="document.getElementById('uploadModal').classList.remove('hidden')"
              class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
        Upload Excel
      </button>

      <!-- Generate PDF Button -->
      <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
        Generate PDF
      </button>

      <!-- Delete Button -->
      <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow">
        Delete
      </button>
    </div>

    <!-- Search Bar -->
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search..."
           class="border px-4 py-2 rounded w-64 shadow-sm" />
  </div>

  <!-- Data Table -->
  <div class="overflow-x-auto bg-white rounded shadow">
    <table class="min-w-full text-sm text-left">
      <thead class="bg-gray-200 text-gray-700 uppercase">
        <tr>
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Department</th>
          <th class="px-4 py-3">Phone</th>
          <th class="px-4 py-3">Address</th>
        </tr>
      </thead>
      <tbody id="dataTable">
        <?//php foreach ($data as $row): ?>
        <tr class="border-b hover:bg-gray-100">
          <td class="px-4 py-2"><?//= esc($row['id']) ?></td>
          <td class="px-4 py-2"><?//= esc($row['name']) ?></td>
          <td class="px-4 py-2"><?//= esc($row['email']) ?></td>
          <td class="px-4 py-2"><?//= esc($row['department']) ?></td>
          <td class="px-4 py-2"><?//= esc($row['phone']) ?></td>
          <td class="px-4 py-2"><?//= esc($row['address']) ?></td>
        </tr>
        <?//php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Upload Modal -->
<div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
    <h2 class="text-lg font-bold mb-4">Upload Excel File</h2>
    <form action="<?= base_url('/excel/upload') ?>" method="post" enctype="multipart/form-data">
      <input type="file" name="excel_file" accept=".xlsx,.xls" class="mb-4 w-full border p-2 rounded" required />
      <div class="flex justify-end gap-2">
        <button type="button" onclick="document.getElementById('uploadModal').classList.add('hidden')"
                class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Upload</button>
      </div>
    </form>
  </div>
</div>

<script>
  function searchTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const rows = document.getElementById("dataTable").getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
      let cells = rows[i].getElementsByTagName("td");
      let found = false;
      for (let j = 0; j < cells.length; j++) {
        if (cells[j].innerText.toLowerCase().includes(input)) {
          found = true;
          break;
        }
      }
      rows[i].style.display = found ? "" : "none";
    }
  }
</script>

<?= $this->endSection() ?>
