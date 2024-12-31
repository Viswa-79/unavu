import 'package:flutter/material.dart';
import 'package:unavu/auth/login.dart';
import 'package:unavu/screen/verification.dart';

class Signup extends StatefulWidget {
  const Signup({super.key});

  @override
  State<Signup> createState() => _SignupState();
}

class _SignupState extends State<Signup> {
  bool _obscureText = true;

  void _togglePasswordVisibility() {
    setState(() {
      _obscureText = !_obscureText; // Toggle the boolean value
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color.fromARGB(255, 11, 19, 43),
      body: Container(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: <Widget>[
            const SizedBox(
              height: 60,
            ),
            Align(
              alignment: Alignment.topLeft,
              child: IconButton(
                style: const ButtonStyle(
                  backgroundColor: WidgetStatePropertyAll(Colors.white),
                ),
                onPressed: () {
                  Navigator.pop(context);
                },
                padding: const EdgeInsets.only(left: 6),
                icon: const Icon(Icons.arrow_back_ios),
              ),
            ),
            const Padding(
              padding: EdgeInsets.all(10.0),
              child: Column(),
            ),
            const Center(
              child: Text(
                'Sign Up',
                style: TextStyle(
                    fontSize: 30, color: Colors.white, fontFamily: "Nunito-SB"),
              ),
            ),
            const SizedBox(
              height: 5,
            ),
            const Center(
              child: Text(
                'Please sign up to get started',
                style: TextStyle(
                    fontSize: 20, color: Colors.white, fontFamily: "Nunito"),
              ),
            ),
            const SizedBox(
              height: 50,
            ),
            Expanded(
              child: Container(
                decoration: const BoxDecoration(
                  borderRadius: BorderRadius.only(
                    topLeft: Radius.circular(30),
                    topRight: Radius.circular(30),
                  ),
                  color: Colors.white,
                ),
                child: Column(
                  children: <Widget>[
                    const SizedBox(
                      height: 40,
                    ),
                    Container(
                      padding: const EdgeInsets.fromLTRB(20, 0, 20, 0),
                      child: const TextField(
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                            borderRadius: BorderRadius.all(Radius.circular(16)),
                          ),
                          labelText: 'Username',
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 30,
                    ),
                    Container(
                      padding: const EdgeInsets.fromLTRB(20, 0, 20, 0),
                      child: const TextField(
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                            borderRadius: BorderRadius.all(Radius.circular(16)),
                          ),
                          labelText: 'Email',
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 30,
                    ),
                    Container(
                      padding: const EdgeInsets.fromLTRB(20, 0, 20, 0),
                      child: const TextField(
                        keyboardType: TextInputType.number,
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                            borderRadius: BorderRadius.all(Radius.circular(16)),
                          ),
                          labelText: 'Mobile No.',
                          hintText: '+91',
                        ),
                      ),
                    ),
                    const SizedBox(height: 30),
                    Container(
                      padding: const EdgeInsets.fromLTRB(20, 0, 20, 0),
                      child: TextField(
                        obscureText: _obscureText,
                        decoration: InputDecoration(
                          suffixIcon: IconButton(
                            icon: Icon(
                              _obscureText
                                  ? Icons.visibility
                                  : Icons.visibility_off,
                            ),
                            onPressed:
                                _togglePasswordVisibility, // Toggle the password visibility
                          ),
                          border: const OutlineInputBorder(
                            borderRadius: BorderRadius.all(Radius.circular(16)),
                          ),
                          labelText: 'Password',
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 50,
                    ),
                    Padding(
                      padding: const EdgeInsets.only(right: 20.0, left: 20),
                      child: Container(
                        decoration: BoxDecoration(
                            color: Colors.orange,
                            borderRadius: BorderRadius.circular(10)),
                        height: 60,
                        width: double.infinity,
                        child: TextButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => const Verification()),
                            );
                          },
                          child: const Text(
                            "SIGN UP",
                            style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: Colors.white,
                                fontFamily: "ibm"),
                          ),
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 20,
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        const Text(
                          "Already have an account?",
                          style: TextStyle(
                              fontSize: 18,
                              color: Colors.grey,
                              fontFamily: "Nunito"),
                        ),
                        TextButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => const Login()),
                            );
                          },
                          child: const Text(
                            'LOG IN',
                            style: TextStyle(
                                fontSize: 15,
                                color: Colors.orange,
                                fontFamily: "ibm",
                                fontWeight: FontWeight.bold),
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
