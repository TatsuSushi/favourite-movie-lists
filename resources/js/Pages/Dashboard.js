import React, { useState, useEffect } from "react";
import ReactDom from "react-dom";
import Button from "react-bootstrap/Button";
import Table from "react-bootstrap/Table";
import "../../../public/css/dashboard.css";
import "bootstrap/dist/css/bootstrap.min.css";
import AddMovie from "../Components/AddMovie";
import Form from "react-bootstrap/Form";

const axios = require("axios");
let TMDBApiKey = process.env.MIX_TMDB_API;

const Dashboard = () => {
    //Hook states for movie details
    const [titles, setTitles] = useState([]);
    const [posters, setPosters] = useState([]);
    const [overviews, setOverviews] = useState([]);
    const [movieID, setMovieID] = useState([]);

    //Alert messages conditionally  received from back-end
    if (window.status && window.status !== "null") {
        alert(window.status);
        window.status = null;
    }

    const moviesList = window.movies;

    async function getMovieDetails() {
        moviesList.map((movie, index) =>
            axios
                .get(
                    `https://api.themoviedb.org/3/find/${movie.favourite_movie_id}?api_key=${TMDBApiKey}&language=en-US&external_source=imdb_id`
                )
                //if movie id is valid, output data, otherwise ignore error
                .then(function (res) {
                    const data = res.data.movie_results[0];
                    console.log("movie details ", data);
                    if (data !== undefined) {
                        setTitles((e) => [...e, data.title]);
                        setPosters((e) => [
                            ...e,
                            `https://image.tmdb.org/t/p/w500` +
                                data.poster_path,
                        ]);
                        setOverviews((e) => [...e, data.overview]);
                        setMovieID((e) => [...e, movie.favourite_movie_id]);
                    } else {
                        console.log("invalid movie id");
                    }
                })
        );
    }

    useEffect(() => {
        getMovieDetails();
    }, []);

    return (
        <div>
            <AddMovie buttonTitle="Add Movie" />
            <div>
                <Table striped bordered hover>
                    <thead>
                        <tr>
                            <th>Movie Name</th>
                            <th>Overview</th>
                            <th>Poster</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {/*map through the data gathered from title, overview and poster hook states*/}
                        {titles.map((title, index) => {
                            return (
                                <tr key={index}>
                                    <td>{title}</td>
                                    <td>{overviews[index]}</td>
                                    <td>
                                        <img
                                            src={posters[index]}
                                            alt="movie poster"
                                        />
                                    </td>
                                    <td>
                                        {/*Remove Movie Button*/}
                                        <Form
                                            method="post"
                                            action="/dashboard-delete"
                                        >
                                            <input
                                                type="hidden"
                                                name="movieID"
                                                value={movieID[index]}
                                            />

                                            <input
                                                type="hidden"
                                                name="_token"
                                                value={window.csrf}
                                            />

                                            <Button
                                                variant="danger"
                                                type="submit"
                                            >
                                                Remove Movie
                                            </Button>
                                        </Form>
                                    </td>
                                </tr>
                            );
                        })}
                    </tbody>
                </Table>
            </div>
        </div>
    );
};

export default Dashboard;

ReactDom.render(<Dashboard />, document.getElementById("dashboard"));
