import MoviesList from "./MoviesList";


const Home = () => {
    return (
        <div className="container">
            <div className="row mt-4">
                <div className="col-md-8">
                    <MoviesList />
                </div>
            </div>
        </div>
    );
};

export default Home;