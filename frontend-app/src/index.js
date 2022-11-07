import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import reportWebVitals from './reportWebVitals';
// import TemperatureControl from './TemperatureControl';
import ToDoList from './ToDoList';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    {/* <TemperatureControl step={1}/> */}
    <ToDoList />
  </React.StrictMode>
);

reportWebVitals();
