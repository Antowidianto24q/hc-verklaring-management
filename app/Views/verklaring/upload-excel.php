<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Wrap entire content in Alpine component -->
<div x-data="{ 
    openModal: false,
    currentPage: 1,
    perPage: 10,
    selectedIds: [],
    masterChecked: false,
    searchTerm: '',
    get filteredRows() {
        const searchLower = this.searchTerm.toLowerCase();
        return Array.from(document.querySelectorAll('#dataTable tbody tr'))
            .filter(row => {
                if (!searchLower) return true;
                const text = row.textContent.toLowerCase();
                return text.includes(searchLower);
            });
    },
    get totalPages() {
        return Math.ceil(this.filteredRows.length / this.perPage);
    },
    get paginatedRows() {
        const start = (this.currentPage - 1) * this.perPage;
        const end = start + this.perPage;
        return this.filteredRows.slice(start, end);
    },
    toggleMasterCheck() {
        this.masterChecked = !this.masterChecked;
        this.paginatedRows.forEach(row => {
            const checkbox = row.querySelector('.row-checkbox');
            const rowId = checkbox.value;
            checkbox.checked = this.masterChecked;
            
            if(this.masterChecked) {
                if(!this.selectedIds.includes(rowId)) {
                    this.selectedIds.push(rowId);
                }
            } else {
                const index = this.selectedIds.indexOf(rowId);
                if(index > -1) {
                    this.selectedIds.splice(index, 1);
                }
            }
        });
    },
    handleRowCheck(rowId) {
        if(this.selectedIds.includes(rowId)) {
            const index = this.selectedIds.indexOf(rowId);
            this.selectedIds.splice(index, 1);
        } else {
            this.selectedIds.push(rowId);
        }
        
        // Update master checkbox state
        const allChecked = this.paginatedRows.every(row => {
            const rowId = row.querySelector('.row-checkbox').value;
            return this.selectedIds.includes(rowId);
        });
        this.masterChecked = allChecked;
    },
    goToPage(page) {
        if(page >= 1 && page <= this.totalPages) {
            this.currentPage = page;
            this.masterChecked = false;
        }
    },
    changePerPage(value) {
        this.perPage = parseInt(value);
        this.currentPage = 1;
        this.masterChecked = false;
    },
    init() {
        // Initialize visibility
        this.updateRowVisibility();
    },
    updateRowVisibility() {
        const allRows = document.querySelectorAll('#dataTable tbody tr');
        // First hide all rows
        allRows.forEach(row => row.style.display = 'none');
        
        // Show filtered rows
        this.filteredRows.forEach(row => row.style.display = '');
        
        // Then show only paginated rows
        this.paginatedRows.forEach(row => row.style.display = '');
    }
}" 
x-init="init()"
x-effect="updateRowVisibility()"
x-cloak>
    <div class="container mx-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Excel Data Importer</h1>
        
        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4 mb-6">
            <!-- Upload Button -->
            <button @click="openModal = true" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                Upload Template
            </button>
            
            <!-- Generate PDF Button -->
            <button id="generatePdf" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Generate PDF
            </button>
            
            <!-- Delete Button -->
            <button id="deleteData" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Delete Data
            </button>
        </div>
        
        <!-- Search Bar and Entries Control -->
        <div class="flex flex-col md:flex-row justify-between mb-4 gap-4">
            <!-- Entries per page dropdown -->
            <div class="flex items-center">
                <span class="mr-2 text-gray-700">Show</span>
                <select x-model="perPage" @change="changePerPage($event.target.value)" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                </select>
                <span class="ml-2 text-gray-700">entries</span>
            </div>
            
            <!-- Search Bar -->
            <div class="relative max-w-md w-full">
                <input 
                    type="text" 
                    x-model="searchTerm" 
                    placeholder="Search data..." 
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Data Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table id="dataTable" class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <!-- Added checkbox column -->
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" x-model="masterChecked" @click="toggleMasterCheck">
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">State</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zip</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hire Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php for ($i = 1; $i <= 20; $i++): ?>
                    <tr>
                        <!-- Added checkbox for each row -->
                        <td class="px-4 py-4 whitespace-nowrap">
                            <input type="checkbox" 
                                   class="row-checkbox"
                                   value="<?= $i ?>" 
                                   :checked="selectedIds.includes('<?= $i ?>')"
                                   @change="handleRowCheck('<?= $i ?>')">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap"><?= $i ?></td>
                        <td class="px-4 py-4 whitespace-nowrap">Employee <?= $i ?></td>
                        <td class="px-4 py-4 whitespace-nowrap">employee<?= $i ?>@company.com</td>
                        <td class="px-4 py-4 whitespace-nowrap">+1 555-<?= rand(100,999)?>-<?= rand(1000,9999)?></td>
                        <td class="px-4 py-4 whitespace-nowrap"><?= rand(100,999)?> Main St</td>
                        <td class="px-4 py-4 whitespace-nowrap">City <?= $i % 3 + 1 ?></td>
                        <td class="px-4 py-4 whitespace-nowrap">State <?= $i % 5 + 1 ?></td>
                        <td class="px-4 py-4 whitespace-nowrap"><?= rand(10000,99999)?></td>
                        <td class="px-4 py-4 whitespace-nowrap">Country <?= $i % 2 + 1 ?></td>
                        <td class="px-4 py-4 whitespace-nowrap">Department <?= $i % 3 + 1 ?></td>
                        <td class="px-4 py-4 whitespace-nowrap">Position <?= $i ?></td>
                        <td class="px-4 py-4 whitespace-nowrap">$<?= number_format(50000 + $i * 1000) ?></td>
                        <td class="px-4 py-4 whitespace-nowrap"><?= date('Y-m-d', strtotime('-'.rand(1,365).' days')) ?></td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $i % 2 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                <?= $i % 2 ? 'Active' : 'Inactive' ?>
                            </span>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            
            <!-- Pagination Controls -->
            <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                <div class="flex flex-1 justify-between sm:hidden">
                    <button 
                        @click="goToPage(currentPage - 1)" 
                        :disabled="currentPage === 1"
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        :class="{'opacity-50 cursor-not-allowed': currentPage === 1}">
                        Previous
                    </button>
                    <button 
                        @click="goToPage(currentPage + 1)" 
                        :disabled="currentPage === totalPages"
                        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        :class="{'opacity-50 cursor-not-allowed': currentPage === totalPages}">
                        Next
                    </button>
                </div>
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium" x-text="(currentPage - 1) * perPage + 1"></span>
                            to
                            <span class="font-medium" x-text="Math.min(currentPage * perPage, filteredRows.length)"></span>
                            of
                            <span class="font-medium" x-text="filteredRows.length"></span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <button 
                                @click="goToPage(currentPage - 1)" 
                                :disabled="currentPage === 1"
                                class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                                :class="{'opacity-50 cursor-not-allowed': currentPage === 1}">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            
                            <template x-for="page in totalPages">
                                <button 
                                    @click="goToPage(page)"
                                    :class="{
                                        'bg-indigo-600 text-white hover:bg-indigo-700': currentPage === page, 
                                        'text-gray-900 hover:bg-gray-50': currentPage !== page
                                    }"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold ring-1 ring-inset ring-gray-300 focus:z-20 focus:outline-offset-0"
                                    x-text="page"></button>
                            </template>
                            
                            <button 
                                @click="goToPage(currentPage + 1)" 
                                :disabled="currentPage === totalPages"
                                class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                                :class="{'opacity-50 cursor-not-allowed': currentPage === totalPages}">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div x-show="openModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="openModal = false"></div>
            
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-auto z-10 overflow-hidden transform transition-all">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Upload Excel File</h3>
                    
                    <form id="uploadForm" action="<?= base_url('excel/import') ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="excelFile">
                                Select Excel File (XLSX/XLS)
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300 cursor-pointer">
                                    <div class="flex flex-col items-center justify-center pt-7">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="pt-1 text-sm tracking-wider text-gray-400">Select Excel file</p>
                                    </div>
                                    <input type="file" id="excelFile" name="excel_file" class="opacity-0" accept=".xlsx, .xls" required>
                                </label>
                            </div>
                            <p id="fileName" class="text-xs text-gray-500 mt-2 text-center">No file selected</p>
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <button type="button" @click="openModal = false" class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-md">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End of Alpine component -->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    // File name display
    document.getElementById('excelFile')?.addEventListener('change', function(e) {
        const fileName = document.getElementById('fileName');
        if(this.files.length > 0) {
            fileName.textContent = this.files[0].name;
        } else {
            fileName.textContent = 'No file selected';
        }
    });

    // Button event handlers
    document.getElementById('generatePdf')?.addEventListener('click', function() {
        alert('PDF generation functionality would be implemented here');
    });

    document.getElementById('deleteData')?.addEventListener('click', function() {
        if(confirm('Are you sure you want to delete all data?')) {
            alert('Data deletion functionality would be implemented here');
        }
    });

    // Form submission with fetch API
    document.getElementById('uploadForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const response = await fetch(this.action, {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if(result.success) {
            alert('File uploaded successfully!');
            location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    });
</script>
<?= $this->endSection() ?>