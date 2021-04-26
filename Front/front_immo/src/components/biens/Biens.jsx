import React from "react";
import PropTypes from 'prop-types'
import BienItem from "../biens/BienItem";
import Spinner from "../Layouts/Spinner";

const Biens = ({ biens, loading }) => {
  if (loading) {
    return <Spinner />;
  } else {
    return (
      <div style={biensStyle}>
        {biens.map((bien) => (
          <BienItem key={bien.id} bien={bien} />
        ))}
      </div>
    );
  }
};
Biens.protoTypes = {
  biens: PropTypes.array.isRequired,
  loading: PropTypes.bool.isRequired,
}

const biensStyle = {
  display: "grid",
  gridTemplateColumns: "repeat(3, 1fr)",
  gridGap: "1rem",
};

export default Biens;
