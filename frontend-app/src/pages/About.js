import { Link } from "react-router-dom";

const About = () => {
    return (
        <div className="container text-center p-5">
            <h1>About Us</h1>
            <div className="col-lg-6 mx-auto">
                <p className="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias asperiores deleniti, deserunt dolorem doloremque et eum eveniet ex facere facilis impedit molestias mollitia provident repellat tempore totam vel vitae.</p>
                <Link to={"/movies"} className="btn btn-primary">Explore</Link>
            </div>
        </div>
    );
};

export default About;

