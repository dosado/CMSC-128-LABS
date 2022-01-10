from flask_wtf import FlaskForm
from wtforms import StringField, SubmitField
from wtforms import validators
from wtforms.fields.simple import PasswordField
from wtforms.validators import DataRequired, Length, equal_to 

class UsernameForm(FlaskForm):
    username = StringField('Name', validators=[DataRequired(), Length(min=2, max=20)])
    password = PasswordField('Password', validators=[DataRequired()])
    submit = SubmitField('Log in')

    
class Registration_Form(FlaskForm):
        first_name = StringField('first_Name', validators=[DataRequired(), Length(min=2, max=20)])
        last_name = StringField('last_Name', validators=[DataRequired(), Length(min=2, max=20)])
        email = StringField('Email',validators=[DataRequired(), Length(min=2, max=20)])
        password = PasswordField('Password', validators=[DataRequired()])
        confirm_password = PasswordField('Confirm Password',validators=[DataRequired(), equal_to('password')])
        submit = SubmitField('Sign Up')        