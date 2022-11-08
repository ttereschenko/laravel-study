import { useContext, useEffect, useRef, useState } from "react";
import './ToDoList.css';
import NotificationContext from './context/NotificationContext';

function ToDoList(props) {
    const { save, load } = props;

    const input = useRef('');
    const [items, setItems] = useState(JSON.parse(load()) ?? []);

    const context = useContext(NotificationContext);

    useEffect(() => {
        save(JSON.stringify(items));
    }, [items]);

    const addItem = (e) => {
        e.preventDefault();

        if (input.current.value === '') {
            context.error('Nothing to add!');
            return;
        }

        const newItems = [...items, { value: input.current.value, isCompleted: false }];

        setItems(newItems);

        input.current.value = '';
        input.current.blur();

        context.success('Item was added!');
    }

    const deleteAll = (e) => {
        setItems([]);
        context.success('All your items were successfully deleted!');
    }

    const toggleCompete = (index) => {
        const newItems = [...items];

        newItems[index].isCompleted = !newItems[index].isCompleted;

        setItems(newItems);
        context.success(`Item was marked as ${newItems[index].isCompleted ? "completed" : "incompleted"}`);
    }

    const deleteItem = (index) => {
        let newItems = [...items];

        newItems.splice(index, 1);

        setItems(newItems);
        context.success('Item was successfully deleted!')
    }

    return (
        <div className="container">
            <h1 className="text-center">ToDo List</h1>
            <div className="lg-6 md-8 sm-10 justify-content-center">
                <div className="input-group">
                    <button onClick={deleteAll} className="input-group-text">Delete All</button>
                    <form className="d-flex flex-fill" onSubmit={addItem}>
                        <input ref={input} type="text" className="form-control w-100" />
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