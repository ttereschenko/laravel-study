import { NavLink } from "react-router-dom";

const Header = () => {
    return (
        <nav className="navbar navbar-expand-lg navbar-light bg-ligh">
            <div className="container justify-content-end">
                <ul className="navbar-nav">
                    <li className="nav-item">
                        <NavLink className="nav-link" to={"/"}>Home</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={"/about"}>About</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={"/movies"}>Movies</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={"/genres"}>Genres</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={"/actors"}>Actors</NavLink>
                    </li>
                </ul>
            </div>
        </nav>
    );
};

export default Header;