import React from 'react';
import './App.css';
import axios from 'axios';
import { useEffect, useState } from 'react';

const App = () => {

    const [data, setData] = useState(null);

    useEffect(() => {
        axios.get('http://localhost/Project/index.php/api/get_data')
        .then(response => setData(response.data))
        .catch(error => console.error('Error', error));
    }, []);
    
    return (
        <div>
            <h1>Hello World!</h1>
            {data}
        </div>
    );
}
    

export default App;
