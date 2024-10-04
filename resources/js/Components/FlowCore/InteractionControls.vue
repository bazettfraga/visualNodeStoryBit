<script setup>
import { Panel, useVueFlow } from '@vue-flow/core'
import { ref } from 'vue'


const {
  nodes,
  edges,
  addNodes,
  nodesDraggable,
  nodesConnectable,
  elementsSelectable,
  zoomOnScroll,
  zoomOnDoubleClick,
  zoomOnPinch,
  panOnScroll,
  panOnScrollMode,
  panOnDrag,
  onConnect,
  onNodeDragStop,
  onPaneClick,
  onPaneScroll,
  onPaneContextMenu,
  onNodeDragStart,
  onMoveEnd,
  addEdges,
  toObject,
} = useVueFlow()


const dimensions = ref({ width: 800, height: 600 }) // Set dimensions as required


const captureZoomClick = ref(false)

const captureZoomScroll = ref(false)

// onConnect((params) => addEdges(params))
onConnect((params) => {
  console.log(params.sourceHandle)
  // Generate a simple edge ID based on source and target node IDs
  const edgeId = `${params.source}-${params.sourceHandle}-${params.target}`;
  addEdges({
    ...params,
    id: edgeId, // Use a simplified ID
  });
});

onNodeDragStart((e) => console.log('drag start', e))

onNodeDragStop((e) => console.log('drag stop', e))

onPaneClick((event) => captureZoomClick.value && console.log('pane click', event))

onPaneScroll((event) => captureZoomScroll.value && console.log('pane scroll', event))

onPaneContextMenu((event) => captureZoomClick.value && console.log('pane ctx menu', event))

onMoveEnd((flowTransform) => console.log('move end', flowTransform))

async function saveGraph() {
  const flowData = toObject(); // Get data from vueFlow
  console.log('Flow data:', flowData); // Log to check structure

  await fetch('/api/nodes/store', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    body: JSON.stringify({ data: flowData }), // Ensure the data is correctly wrapped
  });
}


function onAdd(typeOfNode) {
  const id = `${Date.now()}`; // Use Unix timestamp as ID
  const newNode = {
    id: `${id}`, // Simplified node ID
    label: `Node ${id}`,
    type: typeOfNode,
    position: { x: Math.random() * dimensions.value.width, y: Math.random() * dimensions.value.height },
    data: {} // Initialize the data object
  };

  if (typeOfNode === 'choice') {
    newNode.data.choices = []; // Add choices array to the data object
  }

  if (typeOfNode === 'redirect') {
    newNode.data.redirects = []; // Add choices array to the data object
  }

  addNodes([newNode]);
}

</script>

<template>

  <Panel position="top-right">

    <div>
      <label class="label" for="addingStart">
        Add Start
        <button id="addingStart" @click="onAdd('start')">Add</button>
      </label>
    </div>

    <div>
      <label class="label" for="addingStop">
        Add Stop
        <button id="addingStop" @click="onAdd('stop')">Add</button>
      </label>
    </div>

    <div>
      <label class="label" for="addingTextInput">
        Add textInput
        <button id="addingTextInput" @click="onAdd('textInput')">Add</button>
      </label>
    </div>

    <div>
      <label class="label" for="addingChoice">
        Add choice
        <button id="addingChoice" @click="onAdd('choice')">Add</button>
      </label>
    </div>

    <div>
      <label class="label" for="addingRedirect">
        Add redirect
        <button id="addingRedirect" @click="onAdd('redirect')">Add</button>
      </label>
    </div>

    <div>
      <label class="label" for="addingKeyAdder">
        Add KeyAdder
        <button id="addingKeyAdder" @click="onAdd('keyAdder')">Add</button>
      </label>
    </div>

    <div>
      <label class="label" for="save">
        Save Graph
        <button id="save" @click="saveGraph">Save</button>
      </label>
    </div>
    
    <!-- <div>
      <label class="label" for="draggable">
        nodesDraggable
        <input id="draggable" v-model="nodesDraggable" type="checkbox" class="vue-flow__draggable" />
      </label>
    </div>
    <div>
      <label class="label" for="connectable">
        nodesConnectable
        <input id="connectable" v-model="nodesConnectable" type="checkbox" class="vue-flow__connectable" />
      </label>
    </div>

    

    <div>
      <label class="label" for="selectable">
        elementsSelectable
        <input id="selectable" v-model="elementsSelectable" type="checkbox" class="vue-flow__selectable" />
      </label>
    </div>
    <div>
      <label class="label" for="zoomonscroll">
        zoomOnScroll
        <input id="zoomonscroll" v-model="zoomOnScroll" type="checkbox" class="vue-flow__zoomonscroll" />
      </label>
    </div>
    <div>
      <label class="label" for="zoomonpinch">
        zoomOnPinch
        <input id="zoomonpinch" v-model="zoomOnPinch" type="checkbox" class="vue-flow__zoomonpinch" />
      </label>
    </div>
    <div>
      <label class="label" for="panonscroll">
        panOnScroll
        <input id="panonscroll" v-model="panOnScroll" type="checkbox" class="vue-flow__panonscroll" />
      </label>
    </div>
    <div>
      <label class="label">
        panOnScrollMode
        <select id="panonscrollmode" v-model="panOnScrollMode" class="vue-flow__panonscrollmode">
          <option value="free">free</option>
          <option value="horizontal">horizontal</option>
          <option value="vertical">vertical</option>
        </select>
      </label>
    </div>
    <div>
      <label class="label" for="zoomondbl">
        zoomOnDoubleClick
        <input id="zoomondbl" v-model="zoomOnDoubleClick" type="checkbox" class="vue-flow__zoomondbl" />
      </label>
    </div>
    <div>
      <label class="label" for="panemoveable">
        paneMovable
        <input id="panemoveable" v-model="panOnDrag" type="checkbox" class="vue-flow__panemoveable" />
      </label>
    </div>
    <div>
      <label class="label" for="capturezoompaneclick">
        capture onPaneClick
        <input id="capturezoompaneclick" v-model="captureZoomClick" type="checkbox" class="vue-flow__capturezoompaneclick" />
      </label>
    </div>
    <div>
      <label class="label" for="capturezoompanescroll">
        capture onPaneScroll
        <input id="capturezoompanescroll" v-model="captureZoomScroll" type="checkbox" class="vue-flow__capturezoompanescroll" />
      </label>
    </div> -->
  </Panel>
</template>

<style scoped>
.label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

button {
  background-color: #2563eb;
  border-radius: 3px;
  border: none;
  color: white;
  padding: 5px 5px;
  text-align: center;
  cursor: pointer; /* Add this for better UX */
  font-size: 14px; /* Adjust font size if necessary */
  margin-top: 10px; /* Add some margin for spacing */
}

button:hover {
  background-color: #6b84b9; /* Optional: Darker shade on hover */
}

button:active {
  background-color: #8A2BE2; /* Optional: Even darker shade on click */
}
</style>