import React from "react";

const Bien = (props)=>{
    const {img_url, adress, price, surface} = props.bien;
  return (
    <div>
      <img src={img_url} style={{ maxWidth: "40em", maxHeight: "26em" }} />
      <h3>
        {adress} {surface}
      </h3>
      <h5>
        {price} <i class="fas fa-euro-sign"></i>{" "}
      </h5>
      <div>
        <a href={img_url} className="btn btn-dark btn-sm my-1">
          See More
        </a>
      </div>
    </div>
  );
}

export default Bien;
