import { Link } from "react-router-dom";

const MovieListItem = ({ id, title, year, genres, actors }) => {
    return (
        <article className="mb-3">
            <h2 className="mb-1">{title}, {year}</h2>
            <p className="mb-1">{genres.map(genre => <span key={genre.id}>{genre.name}</span>)}</p>
            <p className="mb-1">{actors.map(actor => <span key={actor.id}>{actor.name} {actor.surname}</span>)}</p>
            <Link to={`/movies/${id}`}>Show details</Link>
        </article>
    );
};

export default MovieListItem;
