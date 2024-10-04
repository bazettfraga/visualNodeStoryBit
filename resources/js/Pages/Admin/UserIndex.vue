<template>
  <AuthenticatedLayout>
    <div class="py-12 dnd-theme">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-parchment bg-cover overflow-hidden shadow-2xl border-4 border-brown rounded-lg p-6">
          <h1 class="text-4xl font-fantasy text-center text-brown mb-8">Adventurers</h1>
          <table class="table-auto w-full dnd-table">
            <thead>
              <tr>
                <th class="px-4 py-2 text-left text-brown">Name</th>
                <th class="px-4 py-2 text-left text-brown">Background</th>
                <th class="px-4 py-2 text-left text-brown">Class</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id" class="bg-paper border-b-2 border-brown hover:bg-paper-light">
                <td class="border px-4 py-2 text-brown">{{ user.name }}</td>
                <td class="border px-4 py-2 text-brown">
                  {{ user.background ? user.background.name : 'No background selected' }}
                </td>
                <td class="border px-4 py-2 text-brown">
                  {{ user.dnd_class ? user.dnd_class.name : 'No class selected' }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
  users: {
    type: Array,
    required: true,
  }
})
</script>

<style scoped>
/* Parchment-like background */
.bg-parchment {
  background-image: url('path_to_parchment_image.jpg');
}

/* Paper background for table rows */
.bg-paper {
  background-color: #f4f1e8;
}

.bg-paper-light {
  background-color: #f9f6eb;
}

.dnd-theme {
  font-family: 'IM Fell English SC', serif;
  color: #4e342e;
}

/* Fantasy style font for heading */
.font-fantasy {
  font-family: 'Cinzel Decorative', serif;
}

/* Custom brown color for text and borders */
.text-brown {
  color: #4e342e;
}

.border-brown {
  border-color: #4e342e;
}

.dnd-table th, .dnd-table td {
  border-color: #4e342e;
}

/* Hover effect for rows */
.dnd-table tr:hover {
  background-color: #f9f6eb;
}

.shadow-2xl {
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4);
}

/* Rounded corners for the table */
.rounded-lg {
  border-radius: 12px;
}

/* Responsive text size */
h1 {
  font-size: 2.5rem;
  line-height: 1.2;
}

@media (min-width: 768px) {
  h1 {
    font-size: 3rem;
  }
}

/* Apply styles to the buttons if any */
.submit-button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
  background-color: #7f5539;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background-color: #6f4e37;
}

.submit-button:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(127, 85, 57, 0.5);
}
</style>