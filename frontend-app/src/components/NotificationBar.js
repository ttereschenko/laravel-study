import { useContext } from "react";
import NotificationContext from '../context/NotificationContext'


const NotificationBar = () => {
    const context = useContext(NotificationContext);

    if (context.text === null) {
        return;
    }

    return (
        <div className={`alert alert-${context.type}`} role="alert">
            {context.text}
        </div>
    );
}

export default NotificationBar;