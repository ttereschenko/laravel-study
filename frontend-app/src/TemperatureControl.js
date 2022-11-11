import { useContext, useEffect, useState } from "react";
import './TemperatureControl.css';
import NotificationContext from "./context/NotificationContext";

function TemperatureControl(props) {
    const { save, load, initital = 0 } = props;
    const [count, setCount] = useState(parseInt(load() ?? initital));
    const context = useContext(NotificationContext);

    useEffect(() => {
        document.title = `${count} degrees`;
        save(count);
    });

    const increase = () => {
        if (count < 30) {
            setCount(count + props.step);
            context.success(`Temperature rose to ${count + props.step} degrees`);
        }
    }

    const decrease = () => {
        if (count > 0) {
            setCount(count - props.step);
            context.success(`Temperature dropped to ${count - props.step} degrees`);
        }
    }

    return (
        <div className="app-container">
            <div className="temperature-display-container">
                <div className={`temperature-display  ${count > 15 ? "hot" : "cold"}`}>
                    {count}
                </div>
            </div>
            <div className="button-container">
                <button onClick={increase}>+</button>
                <button onClick={decrease}>-</button>
            </div>
        </div>
    );
}

export default TemperatureControl;