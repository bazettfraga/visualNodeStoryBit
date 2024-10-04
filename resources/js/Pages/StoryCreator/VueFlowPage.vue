<template>
  <div class="vue-flow-container">
    <VueFlow 
      :nodes="nodes" 
      :edges="edges" 
      @node-position-change="(event) => { console.log('Event emitted:', event); handleNodePositionChange(event); }"
    >
      <Background />
      <Controls />
      <MiniMap />
      <NodeToolbar />

      <template #node-special="specialNodeProps">
        <SpecialNode v-bind="specialNodeProps" />
      </template>

      <template #edge-special="specialEdgeProps">
        <SpecialEdge v-bind="specialEdgeProps" />
      </template>
    </VueFlow>
    <button @click="addNode" class="add-node-button">Add Node</button>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { VueFlow } from '@vue-flow/core'
import { Background } from '@vue-flow/background'
import { Controls } from '@vue-flow/controls'
import { MiniMap } from '@vue-flow/minimap'
import { NodeToolbar } from '@vue-flow/node-toolbar'

import SpecialNode from './../../Components/FlowNodes/SpecialNode.vue'
import SpecialEdge from './../../Components/FlowNodes/SpecialEdge.vue'

const nodes = ref([
  { id: '1', type: 'input', position: { x: 250, y: 5 }, data: { label: 'Node 1' } },
  { id: '2', position: { x: 100, y: 100 }, data: { label: 'Node 2' } },
  { id: '3', type: 'output', position: { x: 400, y: 200 }, data: { label: 'Node 3' } },
  { id: '4', type: 'special', position: { x: 400, y: 200 }, data: { label: 'Node 4', title: 'Node 4 Title', text: 'Text area for large texts', hello: 'world' } },
]);

const edges = ref([
  { id: 'e1->2', source: '1', target: '2' },
  { id: 'e2->3', source: '2', target: '3', animated: true },
  { id: 'e3->4', type: 'special', source: '3', target: '4', data: { hello: 'world' } },
]);

const addNode = () => {
  console.log('Node added');
  const newNode = {
    id: (nodes.value.length + 1).toString(),
    position: { x: Math.random() * 800, y: Math.random() * 600 },
    data: { label: `Node ${nodes.value.length + 1}`, title: `Node ${nodes.value.length + 1} Title`, text: 'Text area for large texts' },
  };
  nodes.value = [...nodes.value, newNode];  // Ensure reactivity by creating a new array
};

const handleNodePositionChange = ({ node, position }) => {
  console.log('Node position changed:', node, position);
  const index = nodes.value.findIndex(n => n.id === node.id);
  if (index !== -1) {
    nodes.value[index].position = position;
  }
};

</script>

<style scoped>
.vue-flow-container {
  width: 100%;
  height: 100vh;
  background-color: #1F1F1F;
  position: relative;
}

.add-node-button {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}

.add-node-button:hover {
  background-color: #0056b3;
}
</style>
