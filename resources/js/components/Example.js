import React from 'react';
import axios from "axios";
import ReactDOM from 'react-dom';

class Example extends React.Component {
    constructor() {
        super();
        this.state = {
            products: [],
            cart: [],
            cities: [],
            shippingFee: 0,
            grandTotal: 0,
            selectValue: 0
        };
        this.handleDropdownChange = this.handleDropdownChange.bind(this)
    }

    componentDidMount() {
        axios.get("/cart-items").then(rs => {
            console.log(rs);
            this.setState({
                cart: rs.data.cart,
                cities: rs.data.cities
            })
        })
    }

    placeOrder() {

    }

    handleDropdownChange(e){
        this.setState({selectValue: e.target.value});
    }

    render() {
        const cart = this.state.cart;
        const cities = this.state.cities;
        const lat = this.state.selectValue;
        let total = 0;
        let shippingFee = 0;
        let checkout = 0;
        let grandTotal = 0;
        return (
            <div className="card">
                <div className="card-header">
                    <h3 className="card-title">Đặt hàng</h3>
                </div>
                <div className="card-body table-responsive p-6">
                    <form action="checkout" method="post" className="needs-validation" noValidate>
                        <div className="row">
                            <div className="col-md-6">
                                <div className="form-group">
                                    <label htmlFor="">Customer Name</label>
                                    <input id="" type="text" name="customer_name" className="form-control" required/>
                                    <div className="invalid-feedback">
                                        Please enter name.
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label htmlFor="">Customer Tel</label>
                                    <input type="tel" name="customer_tel" className="form-control" required/>
                                    <div className="invalid-feedback">
                                        Please enter phone number.
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label htmlFor="">Customer Address</label>
                                    <textarea name="customer_address" className="form-control"
                                              defaultValue="" required/>
                                    <div className="invalid-feedback">
                                        Please enter address.
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label htmlFor="">City</label>
                                    <select name="city_id" className="form-control" onChange={this.handleDropdownChange} required>
                                        <option selected disabled>Thành Phố...</option>
                                        {
                                            cities.map(function (e) {
                                                return <option key={e.id} value={e.lat}>{e.city}</option>
                                            })
                                        }
                                        {this.state.selectValue}
                                    </select>
                                    <div className="invalid-feedback">
                                        Please select a supplier.
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-6">
                                <table className="table ">
                                    <tbody>
                                    {
                                        cart.map(function (e) {
                                            total += e.cart_qty * e.price;
                                            {
                                                e.qty < e.cart_qty && checkout++
                                            }
                                            shippingFee = lat;
                                            {total > 10000 ? shippingFee = 0 : shippingFee}
                                            {grandTotal = parseInt(total) + parseInt(shippingFee)}
                                            return [
                                                <tr key={e.id}>
                                                    <td><img src={"upload/" + e.image} width="50px"
                                                             height="50px" alt="img"/></td>

                                                    <td>
                                                        {e.name}
                                                        {e.qty < e.cart_qty &&
                                                        (<p className="text-danger">
                                                            Sản phẩm không đủ số lượng !
                                                        </p>)
                                                        }
                                                    </td>
                                                    <td>{e.price}</td>
                                                    <td>{e.cart_qty}</td>
                                                    <td>{e.cart_qty * e.price}</td>
                                                </tr>
                                            ]
                                        })
                                    }
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colSpan="4">Total</td>
                                        <td>{total}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan="4">Shipping Fee</td>
                                        <td>{shippingFee}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan="4">Grand Total</td>
                                        <td>{grandTotal}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan="5">
                                            {checkout === 0 &&
                                            <div className="form-group">
                                                <button className="btn btn-outline-success" type="submit">
                                                    Place order
                                                </button>
                                            </div>
                                            }
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        );
    }
}

export default Example;

if (document.getElementById('app')) {
    ReactDOM.render(<Example/>, document.getElementById('app'));
}

