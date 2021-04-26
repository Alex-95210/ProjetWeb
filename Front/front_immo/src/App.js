import './App.css';
import Home from './components/Pages/Home'
import axios from 'axios'
import {BrowserRouter as Router, Switch, Route}} from 'react-router-dom';
import React, { Component } from 'react'


class App extends Component {
  state = {
    biens: [],
    loading: false
  }

  async componentDidMount() {
    this.setState({ loading: true })
    // const res = await axios.get('https://')
    const res = [
      {
        id:1,
        img_url:"https://magazine.bellesdemeures.com/sites/default/files/article/image/penthouse-bellesdemeures.jpg",
        adress:"23 rue Oscar et Jean Auriac, 33800, Bordeaux",
        price:"1 770 987",
        surface:"299 m²"
      },
      {
        id:2,
        img_url:"https://www.logehome.fr/media/actualite/101-200/157/adobestock-26436419-1-detail.jpeg",
        adress:"87 rue Oscar et Jean Auriac, 33800, Bordeaux",
        price:"898 234",
        surface:"120 m²"
      },
      {
        id:3,
        img_url:"https://cache.marieclaire.fr/data/photo/w1000_ci/5s/studio-avec-mezzanine-pour-coin-nuit.jpg",
        adress:"3 rue Oscar et Jean Auriac, 33800, Bordeaux",
        price:"120 000",
        surface:"23 m²"
      },
      {
        id:4,
        img_url:"https://www.mpdunne.com/cms/wp-content/uploads/2019/11/spca_visual_marbella__mg_8036-edit.jpg",
        adress:"58 rue Oscar et Jean Auriac, 33800, Bordeaux",
        price:"3 898 234",
        surface:"1000 m²"
      }
    ]
    this.setState({ biens: res, loading: false })
  }
  render(){
    return (
    <div className="App">
      <Home loading={this.state.loading} biens={this.state.biens} />
    </div>
  );
  }
  
}

export default App;
