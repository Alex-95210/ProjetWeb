import React from 'react'
import Navbar from '../Layouts/Navbar'
import Biens from '../biens/Biens'
const Home = (props) => {
    return (
        <div>
            <Navbar title="Internationnal Trade Auto"/>
            <div className="container">
                <Biens biens={props.biens} loading={props.loading}/>  
            </div>
        </div>
    )
}

export default Home
