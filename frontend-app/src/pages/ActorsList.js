import { useEffect, useRef, useState } from "react";
import ActorListItem from "../components/ActorListItem";

const ActorsList = () => {
    const dataLoaded = useRef(false);
    const [actors, setActors] = useState([]);

    useEffect (() => {
        if (dataLoaded.current) {
            return;
        }

        dataLoaded.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/actors`;
        
        fetch(url)
            .then(response => response.json())
            .then(json => setActors(json.data));
    });

    return (
        <div className="container">
            <div className="row mt-4">
                <div className="col-md-8">
                    {actors.map(actor => 
                    <ActorListItem
                    id={actor.id}
                    key={actor.id} 
                    name={actor.name}
                    surname={actor.surname}/> )}
                </div>
            </div>
        </div>
    );
};

export default ActorsList;