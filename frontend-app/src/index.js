import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import reportWebVitals from './reportWebVitals';
// import TemperatureControl from './TemperatureControl';
// import ToDoList from './ToDoList';
// import withLocalStorage from './withLocalStorage';
import { NotificationProvider } from './context/NotificationContext';
import NotificationBar from './components/NotificationBar';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Header from './components/Header';
import Footer from './components/Footer';
import About from './pages/About';
import Home from './pages/Home';
import Movie from './pages/Movie';
import MoviesList from './pages/MoviesList';
import GenresList from './pages/GenresList';
import ActorsList from './pages/ActorsList';

const root = ReactDOM.createRoot(document.getElementById('root'));

// const StorageToDoList = withLocalStorage('todo-list', ToDoList);
// const StorageTemperatureControl = withLocalStorage('temperature-control', TemperatureControl);

root.render(
    <NotificationProvider>
      <NotificationBar />
        <BrowserRouter>
          <Header />
      {/* <StorageTemperatureControl step={1}/> */}
      {/* <StorageToDoList /> */}
          <Routes>
            <Route path='/' element={<Home/>}/>
            <Route path='/about' element={<About/>}/>
            <Route path='/movies'>
              <Route path='' element={<MoviesList/>}/>
              <Route path=':id' element={<Movie/>}/>
            </Route>
            <Route path='/genres' element={<GenresList/>}/>
            <Route path='/actors' element={<ActorsList/>}/>
          </Routes>
          <Footer/>
        </BrowserRouter>
    </NotificationProvider>
);

reportWebVitals();
