<template>
  <div class="vue-flow-container">
    
    <VueFlow :nodes="nodes" :edges="edges">
      <Background />
      <Controls />
      <MiniMap />
    </VueFlow>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { VueFlow } from '@vue-flow/core'
import { Background } from '@vue-flow/background'
import { Controls } from '@vue-flow/controls'
import { MiniMap } from '@vue-flow/minimap' 

import { initialNodes, initialEdges } from './initial-elements.js'


const nodes = ref(initialNodes)
const edges = ref(initialEdges)

console.log('Initial nodes:', nodes.value)
console.log('Initial edges:', edges.value)
</script>

<style scoped>
.vue-flow-container {
  height: 100vh; /* Adjust height as needed */
}
</style>





<!-- <template>
  <div class="vue-flow-container">
    
    <VueFlow :nodes="nodes" :edges="edges">
      <Background />
      <Controls />
      <MiniMap />
    </VueFlow>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { VueFlow } from '@vue-flow/core'
import { Background } from '@vue-flow/background'
import { Controls } from '@vue-flow/controls'
import { MiniMap } from '@vue-flow/minimap'  // Ensure this is correct
import { initialNodes, initialEdges } from './initial-elements.js'

console.log('VueFlowPage component loaded')

const nodes = ref(initialNodes)
const edges = ref(initialEdges)

console.log('Initial nodes:', nodes.value)
console.log('Initial edges:', edges.value)
</script>

<style scoped>
.vue-flow-container {
  height: 100vh; /* Adjust height as needed */
}
</style> -->
