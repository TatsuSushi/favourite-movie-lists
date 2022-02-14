import React, { useState } from "react";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";
import Form from "react-bootstrap/Form";
import "../../../public/css/AddMovie.css";
const AddMovie = (props) => {
    //Define variables
    const [show, setShow] = useState(false);
    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);
    const [validated, setValidated] = useState(false);

    //check validation for each field
    const handleSubmit = (event) => {
        const form = event.currentTarget;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            alert(
                "Oops, there seems to be some invalid or empty fields left behind."
            );
        }

        setValidated(true);
    };

    //When "Add Movie" button is clicked, show modal and get user input to add movie with imdb id
    return (
        <div>
            <Button
                id="add-movie-button"
                variant="primary"
                onClick={handleShow}
            >
                {props.buttonTitle}
            </Button>
            <Modal className="add-movie-modal" show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Add Movie</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form
                        method="post"
                        action="/dashboard-add"
                        onSubmit={handleSubmit}
                        noValidate
                        validated={validated}
                    >
                        <input
                            type="hidden"
                            name="_token"
                            value={window.csrf}
                        />

                        <Form.Group className="mb-3">
                            <Form.Label>Movie IMDB ID</Form.Label>
                            <Form.Control
                                required
                                type="text"
                                placeholder="Enter movie ID"
                                name="movie-id"
                            />
                        </Form.Group>

                        <Button variant="primary" type="submit">
                            Submit
                        </Button>
                    </Form>
                </Modal.Body>
            </Modal>
        </div>
    );
};

export default AddMovie;
