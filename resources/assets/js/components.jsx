import React from 'react';

class helloWorld extends React.Component {
    constructor(props) {
        super(props);
        this.displayName = 'helloWorld';
    }
    render() {
        return <div>{{this.displayName}}</div>;
    }
}

export default helloWorld;
