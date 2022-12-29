import { useEffect, useRef, useState } from "react";
import MovieListItem from "../components/MovieListItem";

const MoviesList = () => {
    const dataLoaded = useRef(false);
    const [movies, setMovies] = useState([]);

    useEffect(() => {
        if (dataLoaded.current) {
            return;
        }

        dataLoaded.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/movies`;
        
        fetch(url)
            .then(response => response.json())
            .then(json => setMovies(json.data));
    }, []);

    return (
        <div className="container">
        <div className="row mt-4">
                <div className="col-md-8">
                    {movies.map(movie => 
                    <MovieListItem
                        id={movie.id}
                        key={movie.id} 
                        title={movie.title} 
                        year={movie.year}
                        genres={movie.genres} 
                        actors={movie.actors}
                    />)}
                </div>
            </div>
        </div>
    );
};

export default MoviesList;
