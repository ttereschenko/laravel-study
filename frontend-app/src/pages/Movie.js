import { useEffect, useRef, useState } from "react";
import { useParams } from "react-router-dom";

const Movie = () => {
    const { id } = useParams();
    const dataLoaded = useRef(false);
    const [movie, setMovie] = useState(null);

    useEffect(() => {
        if (dataLoaded.current) {
            return;
        }

        dataLoaded.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/movies/${id}`;

        fetch(url)
            .then(response => response.json())
            .then(json => setMovie(json.data));
    }, []);

    if (movie === null) {
        return <h1>Loading...</h1>
    }

    return (
        <>
            <h3>{movie.title}, {movie.year}</h3>
            <p>{movie.description}</p>
        </>
    );
};

export default Movie;