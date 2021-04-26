import React from "react";
import PropTypes from 'prop-types'

const BienItem = (props) =>{
  const {img_url, adress, price, surface} = props.bien;
    return <div className="card text-center">
        <img src={img_url} style={{maxWidth: '20em', maxHeight: '13em'}}/>
        <h3>{adress}  {surface}</h3>
        <h5>{price} <i class="fas fa-euro-sign"></i> </h5>
        <div>
          <a href='..//Pages/' className="btn btn-dark btn-sm my-1">See More</a>
        </div>
      </div>;
  }
BienItem.propTypes = {
  bien: PropTypes.object.isRequired
}

export default BienItem;
