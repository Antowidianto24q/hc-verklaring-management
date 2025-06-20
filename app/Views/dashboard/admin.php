<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Dashboard Overview</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
            <div class="flex items-center">
              <div class="p-3 bg-indigo-100 rounded-lg mr-4">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
              </div>
              <div>
                <p class="text-gray-500 text-sm">Total Users</p>
                <p class="text-2xl font-bold">1,245</p>
              </div>
            </div>
          </div>
          
          <div class="bg-green-50 p-4 rounded-lg border border-green-100">
            <div class="flex items-center">
              <div class="p-3 bg-green-100 rounded-lg mr-4">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
              </div>
              <div>
                <p class="text-gray-500 text-sm">Documents</p>
                <p class="text-2xl font-bold">568</p>
              </div>
            </div>
          </div>
          
          <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100">
            <div class="flex items-center">
              <div class="p-3 bg-yellow-100 rounded-lg mr-4">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
              </div>
              <div>
                <p class="text-gray-500 text-sm">Pending</p>
                <p class="text-2xl font-bold">124</p>
              </div>
            </div>
          </div>
          
          <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
            <div class="flex items-center">
              <div class="p-3 bg-blue-100 rounded-lg mr-4">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </div>
              <div>
                <p class="text-gray-500 text-sm">Reports</p>
                <p class="text-2xl font-bold">42</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="bg-white border rounded-lg p-6">
            <h3 class="font-medium text-lg mb-4">Recent Activity</h3>
            <div class="space-y-4">
              <div class="flex items-start">
                <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                  <span class="text-indigo-700 font-medium text-sm">U</span>
                </div>
                <div>
                  <p class="font-medium">User updated profile</p>
                  <p class="text-gray-500 text-sm">2 hours ago</p>
                </div>
              </div>
              
              <div class="flex items-start">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                  <span class="text-green-700 font-medium text-sm">D</span>
                </div>
                <div>
                  <p class="font-medium">Document uploaded</p>
                  <p class="text-gray-500 text-sm">5 hours ago</p>
                </div>
              </div>
              
              <div class="flex items-start">
                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                  <span class="text-yellow-700 font-medium text-sm">A</span>
                </div>
                <div>
                  <p class="font-medium">New approval request</p>
                  <p class="text-gray-500 text-sm">Yesterday</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="bg-white border rounded-lg p-6">
            <h3 class="font-medium text-lg mb-4">System Status</h3>
            <div class="space-y-4">
              <div class="flex justify-between items-center">
                <div>
                  <p>Server Uptime</p>
                  <p class="text-gray-500 text-sm">Production Environment</p>
                </div>
                <div class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">99.9%</div>
              </div>
              
              <div class="flex justify-between items-center">
                <div>
                  <p>Database</p>
                  <p class="text-gray-500 text-sm">MySQL Cluster</p>
                </div>
                <div class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">Operational</div>
              </div>
              
              <div class="flex justify-between items-center">
                <div>
                  <p>Storage</p>
                  <p class="text-gray-500 text-sm">Main Storage System</p>
                </div>
                <div class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm">75% Full</div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?= $this->endSection() ?>
