import { useState } from "react";
import './TemperatureControl.css';

function TemperatureControl(props) {
    const [count, setCount] = useState(10);

    const increase = () => {
        if (count < 30) {
            setCount(count + props.step);
        }
    }

    const decrease = () => {
        if (count > 0) {
            setCount(count - props.step);
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