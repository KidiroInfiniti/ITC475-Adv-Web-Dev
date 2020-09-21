'use strict';

const e = React.createElement;

class WelcomeComponent extends React.Component {

    constructor(props) {
        super(props);
        this.state = { time: new Date() };
    }

    componentDidMount() {
        this.update = setInterval(() => {
            this.setState({ time: new Date() });
        }, 1 * 1000);
    }

    componentWillUnmount() {
        clearInterval(this.update);
    }

    render() {
        const { time } = this.state;

        return (<div>
            <h1>
                {time.toLocaleTimeString()}
            </h1>
        </div>);
    }
}

const domContainer = document.querySelector('#welcome_componenet');
ReactDOM.render(e(WelcomeComponent), domContainer);