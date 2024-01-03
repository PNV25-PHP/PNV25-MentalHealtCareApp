<?php  include '../../layouts/HtmlHead.php' ?>
<div class="container mx-auto p-4 rounded-lg shadow-md bg-white">
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-xl font-semibold">All booking </h2>
  </div>

  <div class="grid grid-cols-6 gap-4">
    <div class="col-span-6">
    </div>

    <div class="col-span-6 bg-gray-100 rounded-lg">
      <div class="grid grid-cols-6 py-4 px-6">
        <div class="col-span-1 font-medium">Doctor</div>
        <div class="col-span-1 font-medium">Specialization</div>
        <div class="col-span-1 font-medium">Hospital</div>
        <div class="col-span-1 font-medium">DateTime</div>
        <div class="col-span-1 font-medium">Quantity</div>
        <div class="col-span-1 font-medium text-center">Status</div>
      </div>

      <div class="grid grid-cols-6 py-2 px-6 gap-4 items-center" v-for="customer in customers">
        <div class="col-span-1">Show từ data</div>
        <div class="col-span-1">Show từ data</div>
        <div class="col-span-1">Show từ data</div>
        <div class="col-span-1">Show từ data</div>
        <div class="col-span-1">Show từ data</div>
        <div class="col-span-1 flex items-center justify-center rounded-full px-3 py-1 text-sm font-medium">
          <span :class="{ 'bg-green-100 text-green-800': customer.status === 'active', 'bg-red-100 text-red-800': customer.status === 'inactive' }">{{ customer.status }}</span>
        </div>
      </div>
    </div>
  </div>
</div>
