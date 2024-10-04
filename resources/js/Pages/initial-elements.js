export const initialNodes = [
  { id: '1', type: 'input', data: { label: 'Node 1' }, position: { x: 250, y: 5 } },
  { id: '2', type: 'output', data: { label: 'Node 2' }, position: { x: 100, y: 100 } }
]

export const initialEdges = [
  { id: 'e1-2', source: '1', target: '2', animated: true }
]
