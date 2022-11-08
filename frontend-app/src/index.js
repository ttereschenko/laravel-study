import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import reportWebVitals from './reportWebVitals';
// import TemperatureControl from './TemperatureControl';
import ToDoList from './ToDoList';
import withLocalStorage from './withLocalStorage';
import { NotificationProvider } from './context/NotificationContext';
import NotificationBar from './components/NotificationBar';

const root = ReactDOM.createRoot(document.getElementById('root'));

const StorageToDoList = withLocalStorage('todo-list', ToDoList);
// const StorageTemperatureControl = withLocalStorage('temperature-control', TemperatureControl);

root.render(
  <React.StrictMode>
    <NotificationProvider>
      <NotificationBar />
      {/* <StorageTemperatureControl step={1}/> */}
      <StorageToDoList />
    </NotificationProvider>
  </React.StrictMode>
);

reportWebVitals();
