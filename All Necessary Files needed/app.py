from flask import *
from forms import UsernameForm, Registration_Form
from flask_session import Session
from datetime import timedelta
import mariadb

#YOUTUBE VIDEO DEFENSE LINK:  https://youtu.be/JOpOEzNvNM4
#Sprint 3 SCRUM YT VIDEO LINK :  https://youtu.be/KG0Vu_RYohQ
#Sprint 2 SCRUM YT VIDEO LINK : https://youtu.be/ZBg2sYHg3O8
#SPrint 1 SCRUM YT VIDEO LINK : https://youtu.be/JhuKAcLkETc

app=Flask(__name__) 

config = {
    'host': '127.0.0.1',
    'user': 'root',
    'password': '',
    'database': 'sprintvisitor'
}


app.config['SECRET_KEY'] = '2efff2e8723c48ea1b54e11f00b8d3c3'
#app.config["SESSION_PERMANENT"] = False
app.permanent_session_lifetime = timedelta(minutes = 5)
app.config['PERMANENT_SESSION_LIFETIME'] =  timedelta(minutes=5)
app.config["SESSION_TYPE"] = "filesystem"
Session(app)



@app.route('/', methods=['POST','GET'])
@app.route('/home', methods=['POST','GET'])
def home():
    form = UsernameForm()
    print("INHOME")
    print("going back to home")       
    return render_template('home.html', form = form)


@app.route('/add', methods = ['POST', 'GET'])
def add():
    if request.method == 'POST':
        visEmail = request.form['username']
        visPass = request.form['password']
        conn = mariadb.connect(**config)
        print(f"WE ARE CONNECTED ORAYT")
        # create a connection cursor
        cur = conn.cursor()
        # execute an SQL statement
        try:
            cur.execute("SELECT * FROM user_account WHERE user_Email = ? ",(visEmail, ))
            existing_Email = cur.fetchone()
            cur.execute("SELECT user_Password FROM user_account WHERE user_Password = ?",(visPass,))
            existing_Password= cur.fetchone()
            if existing_Email and existing_Password != None:

                if visEmail == existing_Email[0] and  visPass == existing_Password[0]:
                    flash('You have been logged in!', 'success')
                    print("DIIN NA")
                    session["main"] = request.form.get("username")
                    session.permanent = True
                    app.permanent_session_lifetime = timedelta(minutes = 5)
                    return redirect(url_for('main'))
            else:
                print("else worked")
                flash('Login Unsuccessful. Please check your email and password', 'danger')
                print("RETURN")                
                return redirect(url_for('home'))
                    
                
        except mariadb.Error as e:
            print(f"Error tayo: {e}")
        
            conn.commit()
            print(f"Last Inserted ID iss: {cur.lastrowid}")
        
            conn.close()
    return redirect(url_for('register'))

@app.route('/main')
def main():
    print("ni?")
    if "main" in session:
            return render_template('main.html')
    else:
        return redirect(url_for("home"))



@app.route('/register', methods=['POST','GET'])
def register():
    form = Registration_Form()
    return render_template('register.html', form = form)

@app.route('/check_email', methods = ['POST', 'GET'])
def chck_Email():
    if request.method == 'POST':
        visEmail = request.form['email']
        conn = mariadb.connect(**config)
        print(f"WE ARE CONNECTED ORAYT")
        # create a connection cursor
        cur = conn.cursor()
        # execute an SQL statement
        try:
            print(visEmail)
            #sql = " INSERT INTO visitor (Visitor_ID, Visitor_Name)  VALUES( NULL, '{}')".format(Visitor_ID, Visitor_Name)
            cur.execute("SELECT user_Email FROM user_account WHERE user_Email = ?",(visEmail,))
            current_Email = cur.fetchone()
            print(current_Email)
            if current_Email != None:
                print('Email Invalid: Email already exists!')
                form = Registration_Form()
                exists = {
                    "email_exists": True
                }
                return render_template('register.html', form = form )
            else:
                print(f"WORKKED")
                firsName = request.form['firstname']
                lasName = request.form['lastname']
                visEmail = request.form['email']
                visPass = request.form['password']
            
                conn = mariadb.connect(**config)
                print(f"WE ARE CONNECTED ORAYT")
                # create a connection cursor
                cur = conn.cursor()
                # execute an SQL statement
                try:
                    print(f"INSERTEDDD")
                    #sql = " INSERT INTO visitor (Visitor_ID, Visitor_Name)  VALUES( NULL, '{}')".format(Visitor_ID, Visitor_Name)
                    cur.execute("INSERT INTO user_account (user_Email, user_Password, first_Name, last_Name) VALUES ('{}','{}','{}','{}')".format(visEmail,visPass,firsName, lasName,))
                    conn.commit()
                    print(f"Last Inserted ID iss: {cur.lastrowid}")
                    conn.close()
                    return redirect(url_for('home'))
                except mariadb.Error as e:
                    print(f"Error tayo: {e}")
                
                conn.commit()
                print(f"Last Inserted ID iss: {cur.lastrowid}")
                
                conn.close()
                form = Registration_Form()
                return render_template('register.html', form=form)
        except mariadb.Error as e:
            print(f"Error tayo: {e}")
    return redirect(url_for('register'))

@app.route("/logout")
def logout():
    print("LOGGED OUTTTT")
    session["main"] = None
    session.pop("main", None)
    return redirect(url_for("home"))

if __name__ == '__main__':
    app.run(debug=True)
    
