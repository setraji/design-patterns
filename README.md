# Entwurfsmuster

I. Entwurfsprinzipien (SOLID):

1. Single-Responsibility-Prinzip:
Jede Klasse soll nur eine einzige Verantwortung haben, um zukünftige Veränderungen zu vermeiden

2. Open-Closed-Prinzip:
Klassen und Methoden sollen für Erweiterungen offen, für Veränderungen jedoch geschlossen sein

3. Liskovsches Substitutionsprinzip:
Was für Superklassen gilt soll auch für abgeleitete Subklassen gelten, damit diese auch korrekt ausgeführt werden (= Ersetzbarkeitsprinzip)

4. Interface-Segregation-Prinzip:
Interfaces sollen nur das beinhalten was ihre Clients tatsächlich benötigen

5. Dependency-Inversion-Prinzip:
Module verschiedener Ebenen sollen von Abstraktionen abhängen
Details sollen von Abstraktionen abhängen, nicht umgekehrt

II.Arten von Entwurfsmustern:

1. Erzeugungsmuster:

Singleton: 	
Stellt sicher, dass von einer Klasse genau ein Objekt existiert, dieses ist global verfügbar (= Antipattern)
Prototype: 	
Neue Instanzen werden aufgrund prototypischer Instanzen erzeugt, dabei wird die Vorlage kopiert und an neue Bedürfnisse angepasst
Factory Method 	
Erzeugt ein Objekt durch Aufruf einer Methode anstatt durch direkten Aufruf eines Konstruktors
Builder 	
Trennt die Konstruktion komplexer Objekte von deren Repräsentationen
Abstract Factory 	
Definiert eine Schnittstelle zur Erzeugung einer Familie von Objekten

2. Strukturmuster

Decorator 	
Kann eine Klasse um zusätzliche Funktionalitäten erweitern
Facade 	
Bietet eine einheitliche und meist vereinfachte Schnittstelle zu einer Menge von Schnittstellen eines Subsystems
Adapter 	
Dient zur Übersetzung einer Schnittstelle in eine andere, dadurch wird die Kommunikation von Klassen mit zueinander inkompatiblen Schnittstellen ermöglicht
Bridge 	
Dient zur Trennung der Implementierung von ihrer Abstraktion (Schnittstelle), wodurch beide unabhängig voneinander verändert werden können
Flyweight 	
Kann bei einer Vielzahl gleicher Objekte durch Auslagerungen Ressoucen einsparen
Composite 	
Kann Teil-Ganzes-Hierarchien repräsentieren
Proxy 	
Das Muster ist in der Lage ein anderes Objekt zu steuern

3. Verhaltensmuster

Observer 	
Greift bei bestimmten Ereignis ein
Memento 	
Lesezeichen setzen oder Undo-Mechanismen
Iterator 	
Implementierung der Datenstruktur bleibt verborgen
Strategy 	
Definiert eine Familie austauschbarer Algorithmen
State 	
Kapselung unterschiedlicher, zustandsabhängiger Verhaltensweisen eines Objektes
Command 	
Empfänger und Clients sind entkoppelt
Chain Of Responsibility 	
Wird für Algorithmen verwendet
Visitor 	
Kapselung von Operationen, es können so unterschiedliche Operationen definiert werden
Interpreter 	
Ist in der Lage Werte und Zustände zu interpretieren
Template Method 	
Ist in der Lage einen Algorithmus variabel zu gestalten
Mediator 	
Vermittelt zwischen verschiedenen Objekten, ohne dass diese Objekte direkt miteinander kommunizieren
