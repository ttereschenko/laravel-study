import { useState } from "react";
import './ToDoList.css';

function ToDoList() {
    const [input, setInput] = useState('');
    const [items, setItems] = useState([]);

    const onInputChange = (e) => {
        setInput(e.target.value);
    }

    const addItem = (e) => {
        e.preventDefault();

        if (input === '') {
            alert('Nothing to add');
            return;
        }

        const newItems = [...items, { value: input, isCompleted: false }];

        setItems(newItems);
        setInput('');
    }

    const deleteAll = (e) => {
        setItems([]);
    }

    const toggleCompete = (index) => {
        const newItems = [...items];

        newItems[index].isCompleted = !newItems[index].isCompleted;

        setItems(newItems);
    }

    const deleteItem = (index) => {
        let newItems = [...items];

        newItems.splice(index, 1);

        setItems(newItems);
    }

    return (
        <div className="container">
            <h1 className="text-center">ToDo List</h1>
            <div className="lg-6 md-8 sm-10 justify-content-center">
                <div className="input-group">
                    <button onClick={deleteAll} className="input-group-text">Delete All</button>
                    <form className="d-flex flex-fill" onSubmit={addItem}>
                        <input onChange={onInputChange} value={input} type="text" className="form-control w-100" />
                        <div className="input-group-append">
                            <button className="input-group-text">Add</button>
                        </div>
                    </form>
                </div>
                <div className="my-3 p-3">
                    <ul className="list-group">
                        {items.map((item, index) => <ToDoItem key={index} toggle={() => toggleCompete(index)}
                            deleteItem={() => deleteItem(index)} value={item.value} isCompleted={item.isCompleted} />)}
                    </ul>
                </div>
            </div>
        </div>
    );
}


function ToDoItem({ value, isCompleted, toggle, deleteItem }) {
    return (
        <li className={`list-group-item d-flex ${isCompleted ? "completed" : ""}`} >
            <input onChange={toggle} checked={isCompleted} className="form-check-input me-1" type="checkbox" />
            <span className="flex-grow-1">{value}</span>
            <button onClick={deleteItem} className="btn btn-close btn-sm" />
        </li>
    );
}

export default ToDoList;