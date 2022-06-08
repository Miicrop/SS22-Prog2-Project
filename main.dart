import 'package:flutter/material.dart';
import 'protokoll.dart';
import 'protokoll-api.dart';
import 'package:http/http.dart' as http;

Future<http.Response> openLock() {
  return http.get(Uri.parse('http://192.168.43.93/open'));
}

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.indigo,
      ),
      home: const MyHomePage(),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key}) : super(key: key);

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  void _openLock() {
    openLock();
  }

  _refreshAction() {
    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Protokoll'), actions: <Widget>[
        IconButton(
            icon: const Icon(Icons.refresh),
            tooltip: 'refresh',
            onPressed: _refreshAction),
      ]),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Container(
          child: FutureBuilder(
              initialData: [],
              future: fetchProtokoll(),
              builder: (context, AsyncSnapshot snapshot) {
                if (snapshot.connectionState == ConnectionState.waiting) {
                  return CircularProgressIndicator();
                } else {
                  return ListView.builder(
                    itemCount: snapshot.data.length,
                    shrinkWrap: true,
                    itemBuilder: (BuildContext context, index) {
                      Protokoll protokoll = snapshot.data[index];
                      return Card(
                        child: Padding(
                          padding: const EdgeInsets.all(8.0),
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: <Widget>[
                              Text(
                                'Tag: ${protokoll.tag}',
                                style: const TextStyle(
                                    fontSize: 20, color: Colors.blueAccent),
                              ),
                              Text(
                                'Zugang: ${protokoll.zugang}',
                                style: const TextStyle(fontSize: 17),
                              ),
                              Text(
                                'Datum: ${protokoll.datum}',
                                style: const TextStyle(fontSize: 17),
                              ),
                            ],
                          ),
                        ),
                      );
                    },
                  );
                }
              }),
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: _openLock,
        tooltip: 'OpenLock',
        child: const Icon(Icons.lock_open),
      ),
    );
  }
}
