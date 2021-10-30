import SearchTwoToneIcon from "@mui/icons-material/SearchTwoTone";
import { Input } from '@mui/material';
import './Header.css';
function Header() {
  return (
    <div className="header">
      <div className="header__left">
      <a href="#"><i class="fab fa-linkedin fa-3x"></i></a>

        <div className="header__search">
          {/* search here */}
          <SearchTwoToneIcon />
          <input type="text" style={{border:'none'}} className="formControl input " />
        </div>
      </div>

      <div className="header__right"></div>
    </div>
  );
}

export default Header;
