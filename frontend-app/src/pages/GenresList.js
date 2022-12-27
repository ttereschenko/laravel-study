import { useEffect, useRef, useState } from "react";
import GenresListItem from "../components/GenreListItem";

const GenresList = () => {
    const dataLoaded = useRef(false);
    const [genres, setGenres] = useState([]);

    useEffect(() => {
        if (dataLoaded.current) {
            return
        }

        dataLoaded.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/genres`;
        
        fetch(url)
            .then(response => response.json())
            .then(json => setGenres(json.data));

    }, []);

    return (
        <div className="container">
            <div className="row mt-4">
                <div className="col-md-8">
                    {genres.map(genre => 
                    <GenresListItem
                    id={genre.id}
                    key={genre.id} 
                    name={genre.name}/> )}
                </div>
            </div>
        </div>
    );
};

export default GenresList;
